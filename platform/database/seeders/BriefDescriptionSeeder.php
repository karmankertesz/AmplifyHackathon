<?php

namespace Database\Seeders;

use App\Models\Lawyer;
use App\Models\Matter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BriefDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matters = [
            ['id' => "1", 'brief_description' => "Tax evasion case involving multinational conglomerate and the IRS. Court ruled in favor of the company, citing lack of evidence for evasion."],
            ['id' => "2", 'brief_description' => "IRS investigation into the bank's tax shelters. Court upheld bank's tax strategies as lawful and compliant."],
            ['id' => "3", 'brief_description' => "IRS audit of tech startup's tax deductions. Court required Hackathon Unlimited to revise deductions and settle additional taxes."],
            ['id' => "4", 'brief_description' => "IRS international tax compliance case against Overseas. Court validated the company's tax practices as lawful."],
            ['id' => "5", 'brief_description' => "State tax audit of Random Incorporated for potential sales tax underreporting. Court exonerated the company."],
            ['id' => "6", 'brief_description' => "IRS tax fraud allegations against a manufacturing company. Court dismissed the claims, ruling in favor of the company."],
            ['id' => "7", 'brief_description' => "IRS audit of Umbda Lumbda Inc. for tax compliance. Court concluded the company's filings were accurate, ruling in favor."],
            ['id' => "8", 'brief_description' => "Aretil's energy tax credit eligibility audit by IRS. Court ruled in favor, affirming the company's project qualifications."],
            ['id' => "9", 'brief_description' => "IRS cross-border tax planning litigation with Corporation of Monsters. Court confirmed the legality of the company's strategies."],
            ['id' => "10", 'brief_description' => "State Department of Revenue's tax compliance case against BananaTech Corporation. Court mandated tax collection adjustments."],
            ['id' => "11", 'brief_description' => "Tech Titans Inc. defends R&D tax credit claims during IRS audit. Court rules in favor, validating the claims."],
            ['id' => "12", 'brief_description' => "GreenWorld Innovations contests IRS dispute over eco investment tax deductions. Court sides with the company."],
            ['id' => "13", 'brief_description' => "PharmaGrow Solutions faces IRS dispute over tax strategy. Court orders reevaluation of the company's tax strategies."],
            ['id' => "14", 'brief_description' => "FastTrack Logistics defends against interstate commerce tax audit. Court confirms company's tax practices."],
            ['id' => "15", 'brief_description' => "Premier Properties LLC contests IRS's capital gains tax assessment. Court rules in favor of the company."],
            ['id' => "16", 'brief_description' => "GlobalEd Institutes' tax-exempt status reviewed by IRS. Court mandates reassessment due to non-compliance."],
            ['id' => "17", 'brief_description' => "Fintech Innovate Inc. faces IRS case on cryptocurrency taxation. Court affirms company's tax reporting methods."],
            ['id' => "18", 'brief_description' => "AgriBusiness Ventures defends agricultural tax credits claim. Court rules in favor, solidifying company's tax planning."],
            ['id' => "19", 'brief_description' => "FutureTech Robotics disputes import tariff tax with CBP. Court upholds the company's tariff classifications."],
            ['id' => "20", 'brief_description' => "Clean Energy Dynamics faces DOE audit on renewable energy incentives. Audit concludes positively for the company."],
            ["id" => "21", "brief_description" => "Real estate developer Aretil successfully challenged an inflated property tax valuation by the county tax assessor, leading to a court-ordered revision and significant tax savings. The case set a regional precedent for property tax disputes."],
            ["id" => "22", "brief_description" => "MediTech Solutions defended its excise tax exemptions for medical equipment against the IRS, ultimately maintaining its tax relief status. The ruling clarified excise tax exemption applications in the healthcare sector."],
            ["id" => "23", "brief_description" => "EcoSustain Agriculture's sustainable farming tax credits were upheld after an IRS audit, validating the company's environmentally responsible practices. The case highlighted the role of tax incentives in promoting sustainable agriculture."],
            ["id" => "24", "brief_description" => "Technology company InnoTech Dynamics retained its R&D tax deductions after the IRS challenged the expenses' qualification. The case clarified R&D expense treatment for tax purposes in the tech industry."],
            ["id" => "25", "brief_description" => "Luxury Autos International won a tax dispute over import duty rates with CBP, leading to a reclassification and reduced duties. The case emphasized the complexities of import duty classifications in international trade."],
            ["id" => "26", "brief_description" => "Global Commerce Corp. defended its corporate tax inversion against IRS evasion claims, securing a legal victory that affirmed its right to globalize operations within the law. The case set a precedent for corporate tax strategy."],
            ["id" => "27", "brief_description" => "VitaHealth Pharmacies contested the state tax authority's denial of sales tax exemptions for medical products, winning the case and ensuring access to tax-exempt essential supplies. The ruling impacted retail pharmacies and healthcare industry tax classification."],
            ["id" => "28", "brief_description" => "NextGen Tech negotiated a favorable settlement with the IRS during an audit on software licensing revenue tax treatment, setting a benchmark for the software industry's tax reporting. The case highlighted the value of expert legal representation in tax matters."],
            ["id" => "29", "brief_description" => "EduTech Innovations claimed tax deductions for its educational software development, which the IRS disputed. The court ruling approved the deductions, supporting investment in educational technology and resources."],
            ["id" => "30", "brief_description" => "GreenTech Enterprises' energy-saving technology tax credit claims were validated by the IRS, emphasizing the role of tax incentives in sustainable technology development. The review's outcome reinforced the company's commitment to energy efficiency."],
            ["id" => "31", "brief_description" => "Zane Industries was acquitted of corporate embezzlement charges after Robert Zane's defense proved the financial transactions were legitimate. The case emphasized the importance of detailed financial documentation in criminal cases."],
            ["id" => "32", "brief_description" => "Dynamic Tech Solutions was found liable for insider trading by the SEC despite Robert Zane's defense that stock sales were pre-scheduled. The ruling served as a strict reminder of insider trading regulations."],
            ["id" => "33", "brief_description" => "Angel City Healthcare was found guilty of Medicare fraud involving billing for unprovided services and upcoding, despite Robert Zane's defense of unintentional discrepancies due to complex billing systems."],
            ["id" => "34", "brief_description" => "Pacific Investments was acquitted of tax evasion charges after Robert Zane successfully argued all income was reported, highlighting the complexities of tax law and the need for clear evidence of evasion."],
            ["id" => "35", "brief_description" => "Metro Commerce Bank was found guilty of bank fraud, including falsifying loan documents, despite Robert Zane's argument of clerical errors, emphasizing strict adherence to financial regulations."],
            ["id" => "36", "brief_description" => "Coastal Financial Services was acquitted of money laundering charges after Robert Zane presented a defense of compliant transactions, underscoring the high proof burden in such financial crime cases."],
            ["id" => "37", "brief_description" => "L.A. Medical Providers Association was found guilty of kickback violations, with Robert Zane's defense unable to refute the evidence, highlighting the strict enforcement of anti-kickback statutes in healthcare."],
            ["id" => "38", "brief_description" => "Sunset Property Management was acquitted of real estate fraud charges after Robert Zane's defense proved there was no fraudulent intent, affirming the need for clear evidence in fraud allegations."],
            ["id" => "39", "brief_description" => "California Exporting Co. was found liable for international trade fraud, with Robert Zane's defense of unintentional misclassification rejected, stressing the importance of customs compliance."],
            ["id" => "40", "brief_description" => "Boyle Accounting Firm was acquitted of aiding tax evasion schemes after Susan Boyle demonstrated compliance, emphasizing the need for clear evidence of intentional tax evasion in such cases."],
            ["id" => "41", "brief_description" => "Manhattan Financial Advisors was cleared of financial misconduct charges related to asset valuation, with Susan Boyle's defense proving compliance, highlighting the complexities of asset valuation."],
            ["id" => "42", "brief_description" => "Broadway Entertainment LLC was found liable for deceptive accounting practices, despite Susan Boyle's argument of industry-specific revenue recognition, stressing the importance of GAAP adherence."],
            ["id" => "43", "brief_description" => "New York Merchants Bank was acquitted of bank fraud and misallocation of funds after Susan Boyle's defense of lawful financial activities, illustrating the need for clear evidence of wrongdoing in bank fraud cases."],
            ["id" => "44", "brief_description" => "Empire State Importers Inc. was found liable for customs fraud by undervaluing goods despite Susan Boyle's defense of clerical errors, emphasizing the legal responsibilities of accurate customs declarations."],
            ["id" => "45", "brief_description" => "Gotham Distribution was acquitted of receiving kickbacks after Susan Boyle demonstrated ethical vendor relationships, highlighting the necessity for concrete evidence in kickback cases."],
            ["id" => "46", "brief_description" => "Metropolis Health Systems was found liable for healthcare billing fraud, with Susan Boyle's defense of clerical errors failing to absolve the systematic false claims, emphasizing rigorous enforcement of billing regulations."],
            ["id" => "47", "brief_description" => "Star City Financial Group was acquitted of wire fraud and money laundering after Susan Boyle's defense of compliance and due diligence, highlighting the importance of anti-money laundering programs."],
            ["id" => "48", "brief_description" => "Queens Commerce LLC was found liable for accounting malpractice after Susan Boyle's defense of compliance with standards was rejected, underscoring the severity of financial misrepresentation."],
            ["id" => "49", "brief_description" => "Liberty Financial Planners was cleared of operating a fraudulent investment scheme as Susan Boyle proved transparency and risk disclosure, highlighting the need for substantial evidence in fraud allegations."],
            ["id" => "50", "brief_description" => "Pearson Investments was acquitted of SEC's securities fraud allegations, including insider trading and financial misrepresentation, after Jessica Pearson's defense proved compliance with regulations."],
            ["id" => "51", "brief_description" => "Westside Tech Corp. was acquitted of embezzlement charges as Jessica Pearson's defense showed financial transactions were legitimate business activities, not embezzlement."],
            ["id" => "52", "brief_description" => "Ventura Capital Partners was cleared of DOJ's insider trading charges due to Jessica Pearson's defense that trades were based on public information, not insider knowledge."],
            ["id" => "53", "brief_description" => "Golden State Real Estate Inc. was exonerated from real estate investment fraud charges after Jessica Pearson demonstrated the company's transparency and absence of fraudulent intent."],
            ["id" => "54", "brief_description" => "Citywide Medical Providers was found liable for healthcare fraud by the FBI for billing discrepancies, despite Jessica Pearson's defense of clerical errors."],
            ["id" => "55", "brief_description" => "Los Angeles Investment Group was cleared of operating a Ponzi scheme, with Jessica Pearson's defense proving the financial losses were due to market volatility, not fraud."],
            ["id" => "56", "brief_description" => "Beverly Hills Wealth Management was acquitted of SEC's misrepresentation allegations in investment advisory services, thanks to Jessica Pearson's argument of good faith actions."],
            ["id" => "57", "brief_description" => "Sunshine Renewable Energy was found liable for tax fraud related to green energy tax credits, despite Jessica Pearson's argument for legitimate claims."],
            ["id" => "58", "brief_description" => "West Coast Pharmaceuticals was cleared of FTC's accounting irregularities and misconduct charges after Jessica Pearson proved adherence to accounting standards."],
            ["id" => "59", "brief_description" => "Austin Capital Insurance won against Prime Industrial Holdings, with Arthur Curry's evidence of the tenant's negligence leading to property damage compensation."],
            ["id" => "60", "brief_description" => "Austin Retail Ventures won a liability insurance claim against SecureRetail Insurance Co. for a customer injury, with Arthur Curry proving the injury was an unforeseeable accident."],
            ["id" => "61", "brief_description" => "Capital Health Management lost a medical malpractice insurance claim to MedPro Insurance Services, with the court upholding the gross negligence exclusion despite Arthur Curry's defense."],
            ["id" => "62", "brief_description" => "Lakeside Residential won against HomeGuard Insurance Ltd. for a renters insurance claim for theft and vandalism, with Arthur Curry's evidence of compliance securing compensation."],
            ["id" => "63", "brief_description" => "Austin Automotive Group was granted compensation by the court for a vandalism and theft claim after Arthur Curry successfully challenged AutoCover Insurance Inc.'s denial of coverage."],
            ["id" => "64", "brief_description" => "Hillside Residential Developers won a construction liability insurance claim for an on-site accident, with Arthur Curry's safety protocol evidence leading to insurer's obligation to pay."],
            ["id" => "65", "brief_description" => "Capital City Tech Hub lost a business interruption insurance claim due to a power outage, as the court ruled the 'Act of God' exclusion applied despite Arthur Curry's defense."],
            ["id" => "66", "brief_description" => "Lakeview Apartments won a renters insurance claim for property loss after Arthur Curry proved the legitimacy of the claim, leading to compensation from RentShield Insurance Co."],
            ["id" => "67", "brief_description" => "Travis Agricultural Co-op won an agricultural insurance claim for a crop failure due to pest infestation, with Arthur Curry's defense proving it was an extraordinary event."],
            ["id" => "68", "brief_description" => "Austin Energy Solutions lost an insurance claim related to equipment malfunction leading to business interruption, with the court supporting the insurer's maintenance requirement exclusion."],
            ["id" => "69", "brief_description" => "Austin Capital Insurance succeeded against Prime Industrial Holdings for property damage caused by negligence, with Louis Litt's litigation securing compensation."],
            ["id" => "70", "brief_description" => "Fleetway Transport LLC won against QuickCover Insurance Co. for a denied cargo damage claim, with Louis Litt's argument on natural disaster exclusion leading to full payment."],
            ["id" => "71", "brief_description" => "Austin Construction Inc. won a claim against SureBuild Insurance Group for an on-site accident, with Louis Litt's defense proving the company's adherence to safety protocols and securing compensation."],
            ["id" => "72", "brief_description" => "Riverbend Estates lost to HomeSafe Insurance Co. over a denied property insurance claim for storm damage, with the court upholding policy exclusions despite Louis Litt's defense."],
            ["id" => "73", "brief_description" => "Central City Retail Group won a business interruption claim against Continuity Insurance Providers after a forced shutdown, with Louis Litt clarifying policy language in their favor."],
            ["id" => "74", "brief_description" => "Lone Star Logistics won against TransitGuard Insurance Co. for a denied claim over lost freight, with Louis Litt's evidence of proper documentation leading to full compensation."],
            ["id" => "75", "brief_description" => "Hill Country Homeowners won against HomeShield Insurance Co. for denied claims after natural disaster damage, thanks to Louis Litt's challenge of policy exclusions."],
            ["id" => "76", "brief_description" => "Capital City Constructions lost to BuildSafe Insurance Ltd. over a denied liability insurance coverage for construction defect, with policy exclusions upheld despite Louis Litt's defense."],
            ["id" => "77", "brief_description" => "Travis County Retail Group won against RetailGuard Insurance Co. for a denied claim over burglary losses, with Louis Litt's defense proving the legitimacy of the claims."],
            ["id" => "78", "brief_description" => "Greenbelt Property Management won against Tenant Liability Insurance Co. for damages caused by tenant negligence, with Louis Litt’s evidence securing compensation."],
            ["id" => "79", "brief_description" => "Austin Capital Insurance succeeded in a claim against Prime Industrial Holdings for tenant-caused property damage, with Melissa Warren's litigation approach leading to victory."],
            ["id" => "80", "brief_description" => "Central Texas Retail Group won a claim against FireSafe Insurance Co. for fire damage coverage, with Melissa Warren proving the incident was covered under policy terms."],
            ["id" => "81", "brief_description" => "Bayside Condominiums lost to AquaProtect Insurance Ltd. over a denied flood insurance claim, with the court finding policy exclusions applicable despite Melissa Warren's defense."],
            ["id" => "82", "brief_description" => "Lakewood Ranch Estates won against WindGuard Insurance Services for windstorm damage coverage, overcoming a denied claim due to late filing with Melissa Warren’s representation."],
            ["id" => "83", "brief_description" => "Texan Auto Dealership Group prevailed over AutoSecure Insurance Inc. in a theft claim denial dispute, with Melissa Warren proving that security measures were met."],
            ["id" => "84", "brief_description" => "River City Shipping Co. won against Maritime Assurance Partners for a denied marine insurance claim over goods damaged in transit, with Melissa Warren’s case proving wrongful denial."],
            ["id" => "85", "brief_description" => "Austin Restaurant Group lost to Culinary Risk Insurers in a food contamination incident claim due to communicable diseases exclusions, despite Melissa Warren's representation."],
            ["id" => "86", "brief_description" => "Lakeline Property Holdings won against Premier Liability Insurance Co. for a slip and fall injury claim coverage, with Melissa Warren discrediting the insurer’s negligence allegations."],
            ["id" => "87", "brief_description" => "TexFlex Sporting Goods lost to ProductGuard Insurance Inc. over a product liability insurance claim, with the court upholding design defect exclusions against Melissa Warren's arguments."],
            ["id" => "88", "brief_description" => "Metroplex Health Systems won a malpractice claim coverage against MedShield Insurance Solutions after Melissa Warren proved timely reporting, challenging the insurer’s denial."],
            ["id" => "89", "brief_description" => "Summit Properties Inc. won a rent increase enforcement case against QuickMart Retail Chain, with Adrian Chase’s lease agreement expertise leading to a favorable ruling."],
            ["id" => "90", "brief_description" => "Gardenview Residential LLC lost an appeal against the City Planning Department's permit denial for a new housing complex, despite Adrian Chase’s defense highlighting the project's compliance."],
            ["id" => "91", "brief_description" => "Highland Retail Partners won a renovation dispute with tenants, successfully arguing the necessity for upgrades with Adrian Chase's representation leading to court approval."],
            ["id" => "92", "brief_description" => "Brookside Condominiums won against their Homeowners Association, with Adrian Chase proving the association overstepped its authority in implementing fines and rules."],
            ["id" => "93", "brief_description" => "CityView Towers lost an objection to a luxury high-rise project due to gentrification and historic preservation concerns, despite Adrian Chase's comprehensive defense."],
            ["id" => "94", "brief_description" => "Evergreen Estates won a boundary dispute with Maplewood Farms, confirming property lines and securing Adrian Chase's successful demonstration of proper boundaries."],
            ["id" => "95", "brief_description" => "Harborview Development Group won against the State Environmental Protection Agency for wrongful obstruction of coastal development, with Adrian Chase's effective legal strategy."],
            ["id" => "96", "brief_description" => "Elmwood Senior Residences won a zoning challenge against the City Zoning Commission, with Adrian Chase proving the community housing need for seniors."],
            ["id" => "97", "brief_description" => "MetroLoft Apartments lost to their tenants over lease changes, with the court siding with the tenants' rights against Adrian Chase's defense of the management company."],
            ["id" => "98", "brief_description" => "Willow Creek Homebuilders won against the State Housing Authority, avoiding a non-compliance fine with Adrian Chase's evidence of adherence to construction standards."],
            ["id" => "99", "brief_description" => "Cityscape Investments won against BuildRight General Contractors for breach of construction contract, with Donna Paulsen's strategic legal approach leading to damages awarded."],
            ["id" => "100", "brief_description" => "Downtown Retail Group won a lease dispute with MegaMart Inc. over exclusive use clause violations, securing an injunction and damages with Donna Paulsen's representation."],
            ["id" => "101", "brief_description" => "Suburban Expansion Ltd. won against the County Planning Board, compelling permit approval for residential subdivision with Donna Paulsen's challenge to delays."],
            ["id" => "102", "brief_description" => "Waterview Properties won against the State Environmental Agency for wrongful denial of waterfront development rights, with Donna Paulsen's comprehensive legal argument."],
            ["id" => "103", "brief_description" => "Oakwood Senior Living successfully halted rezoning that would impact their facility, with Donna Paulsen proving the potential negative effects on residents."],
            ["id" => "104", "brief_description" => "Brighton Park Developers lost to the Homeowners Association over construction defects, ordered to pay for repairs and compensation despite Donna Paulsen's efforts."],
            ["id" => "105", "brief_description" => "Cedar Grove Estates won additional eminent domain compensation from the State Department of Transportation, with Donna Paulsen arguing for fair market value."],
            ["id" => "106", "brief_description" => "Crossroads Mall LLC won against BigBox Retail Inc. despite bankruptcy, enforcing lease provisions and claiming damages with Donna Paulsen's legal expertise."],
            ["id" => "107", "brief_description" => "Bright Horizons Development won against the City Housing Authority, expediting condo conversion process with Donna Paulsen's representation."],
            ["id" => "108", "brief_description" => "Skyline Developers secured a favorable ruling in a zoning regulation challenge against the City Planning Commission, with Mike Ross successfully advocating for the commercial project."],
            ["id" => "109", "brief_description" => "Riverside Apartments LLC won a lawsuit against a tenant for breach of lease terms, including subletting and property damage, with Mike Ross's evidence leading to compensation."],
            ["id" => "110", "brief_description" => "Greenfield Construction Co. won a land use and zoning regulation case against the City Zoning Board, allowing residential development with Mike Ross's defense."],
            ["id" => "111", "brief_description" => "Bayview Investors Group prevailed in an arbitration over commercial lease termination with Downtown Retail Inc., securing damages for early termination with Mike Ross's analysis."],
            ["id" => "112", "brief_description" => "Metro Housing LLP lost a housing development permit appeal against the Municipal Building Department, with Mike Ross unable to overturn the permit denial."],
            ["id" => "113", "brief_description" => "EstatePro Investments lost a lawsuit against Trustworthy REIT Management for breach of fiduciary duty, unable to prove mismanagement with Mike Ross's representation."],
            ["id" => "114", "brief_description" => "Grand Estates Realty won an easement rights dispute with Nextdoor Landowner Inc., confirming property access and maintenance responsibilities with Mike Ross's legal work."],
            ["id" => "115", "brief_description" => "Urban Renewal Associates prevailed against the Historic Preservation Society, continuing historic building renovation with Mike Ross proving compliance with ordinances."],
            ["id" => "116", "brief_description" => "Capital Towers LLC won against the Capital Towers Condominium Association, invalidating new rules that exceeded authority with Mike Ross's defense."],
            ["id" => "117", "brief_description" => "Lakeside Ventures successfully defended against New York City's eminent domain claim, receiving fair compensation with Mike Ross's legal expertise."]
        ];

        foreach ($matters as $matterArray) {
            $matter = Matter::find($matterArray['id']);
            $matter->update([
                'brief_description' => $matterArray['brief_description']
            ]);
        }

        $lawyer = Lawyer::all();
        foreach ($lawyer as $lawyer) {
            $matterCount = $lawyer->matters()->count();

            $winningMatters = $lawyer->matters()->where('in_favour', 1)->count();
            $lawyer->update([
                'total_cases' => $matterCount,
                'winning_rate' => $matterCount == 0 ? 0 : $winningMatters / $matterCount
            ]);
        }

    }
}
