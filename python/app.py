# app.py
from flask import Flask, request, jsonify
from sentence_transformers import SentenceTransformer, util
from openai import OpenAI

app = Flask(__name__)
# Load the model (this may take some time)
model = SentenceTransformer('all-mpnet-base-v2')

@app.route('/generate-vector', methods=['POST'])
def genreate_vector():
    input_data = request.json
    payload = input_data['payload']
    embeddings = model.encode(payload, convert_to_tensor=True)
    return jsonify(embeddings.tolist())

@app.route('/sematic-search', methods=['POST'])
def semantic_search():
    input_data = request.json
    case_embeddings = input_data['case_embeddings']
    query_embedding  = embeddings = model.encode(input_data['query'], convert_to_tensor=True)
    cosine_scores = util.pytorch_cos_sim(query_embedding, case_embeddings)
    sorted_matches = cosine_scores.argsort(descending=True)
    results = [{"index": int(match_index), "score": float(cosine_scores[0, match_index])} for match_index in sorted_matches[0]]
    return jsonify(results)

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')