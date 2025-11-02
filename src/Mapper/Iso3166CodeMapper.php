<?php

namespace CountryPack\Mapper;

use CountryPack\Contracts\Iso3166CodeMapperInterface;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Enum\Iso31661Alpha3;
use CountryPack\Enum\Iso31661Numeric;

class Iso3166CodeMapper implements Iso3166CodeMapperInterface
{
    private array $alpha2Map = [];

    private array $alpha3Map = [];

    private array $numericMap = [];

    public function __construct()
    {
        $this->initialize();
    }

    private function initialize(): void
    {
        $mapData = self::getCountryData();

        foreach ($mapData as [$alpha2, $alpha3, $numeric]) {
            $alpha2Id = spl_object_id($alpha2);
            $alpha3Id = spl_object_id($alpha3);
            $numericId = spl_object_id($numeric);

            $this->alpha2Map[$alpha2Id] = [
                'alpha3' => $alpha3,
                'numeric' => $numeric,
            ];
            $this->alpha3Map[$alpha3Id] = [
                'alpha2' => $alpha2,
                'numeric' => $numeric,
            ];
            $this->numericMap[$numericId] = [
                'alpha2' => $alpha2,
                'alpha3' => $alpha3,
            ];
        }
    }

    public function mapIso31661Alpha2ToIso31661Alpha3(Iso31661Alpha2 $isoCode): ?Iso31661Alpha3
    {
        return $this->alpha2Map[spl_object_id($isoCode)]['alpha3'] ?? null;
    }

    public function mapIso31661Alpha3ToIso31661Alpha2(Iso31661Alpha3 $isoCode): ?Iso31661Alpha2
    {
        return $this->alpha3Map[spl_object_id($isoCode)]['alpha2'] ?? null;
    }

    public function mapIso31661Alpha2ToIso31661Numeric(Iso31661Alpha2 $isoCode): ?Iso31661Numeric
    {
        return $this->alpha2Map[spl_object_id($isoCode)]['numeric'] ?? null;
    }

    public function mapIso31661NumericToIso31661Alpha2(Iso31661Numeric $isoCode): ?Iso31661Alpha2
    {
        return $this->numericMap[spl_object_id($isoCode)]['alpha2'] ?? null;
    }

    public function mapIso31661Alpha3ToIso31661Numeric(Iso31661Alpha3 $isoCode): ?Iso31661Numeric
    {
        return $this->alpha3Map[spl_object_id($isoCode)]['numeric'] ?? null;
    }

    public function mapIso31661NumericToIso31661Alpha3(Iso31661Numeric $isoCode): ?Iso31661Alpha3
    {
        return $this->numericMap[spl_object_id($isoCode)]['alpha3'] ?? null;
    }

    private static function getCountryData(): array
    {
        return [
            [Iso31661Alpha2::AD, Iso31661Alpha3::AND, Iso31661Numeric::_020],
            [Iso31661Alpha2::AE, Iso31661Alpha3::ARE, Iso31661Numeric::_784],
            [Iso31661Alpha2::AF, Iso31661Alpha3::AFG, Iso31661Numeric::_004],
            [Iso31661Alpha2::AG, Iso31661Alpha3::ATG, Iso31661Numeric::_028],
            [Iso31661Alpha2::AI, Iso31661Alpha3::AIA, Iso31661Numeric::_660],
            [Iso31661Alpha2::AL, Iso31661Alpha3::ALB, Iso31661Numeric::_008],
            [Iso31661Alpha2::AM, Iso31661Alpha3::ARM, Iso31661Numeric::_051],
            [Iso31661Alpha2::AO, Iso31661Alpha3::AGO, Iso31661Numeric::_024],
            [Iso31661Alpha2::AQ, Iso31661Alpha3::ATA, Iso31661Numeric::_010],
            [Iso31661Alpha2::AR, Iso31661Alpha3::ARG, Iso31661Numeric::_032],
            [Iso31661Alpha2::AS, Iso31661Alpha3::ASM, Iso31661Numeric::_016],
            [Iso31661Alpha2::AT, Iso31661Alpha3::AUT, Iso31661Numeric::_040],
            [Iso31661Alpha2::AU, Iso31661Alpha3::AUS, Iso31661Numeric::_036],
            [Iso31661Alpha2::AW, Iso31661Alpha3::ABW, Iso31661Numeric::_533],
            [Iso31661Alpha2::AX, Iso31661Alpha3::ALA, Iso31661Numeric::_248],
            [Iso31661Alpha2::AZ, Iso31661Alpha3::AZE, Iso31661Numeric::_031],
            [Iso31661Alpha2::BA, Iso31661Alpha3::BIH, Iso31661Numeric::_070],
            [Iso31661Alpha2::BB, Iso31661Alpha3::BRB, Iso31661Numeric::_052],
            [Iso31661Alpha2::BD, Iso31661Alpha3::BGD, Iso31661Numeric::_050],
            [Iso31661Alpha2::BE, Iso31661Alpha3::BEL, Iso31661Numeric::_056],
            [Iso31661Alpha2::BF, Iso31661Alpha3::BFA, Iso31661Numeric::_854],
            [Iso31661Alpha2::BG, Iso31661Alpha3::BGR, Iso31661Numeric::_100],
            [Iso31661Alpha2::BH, Iso31661Alpha3::BHR, Iso31661Numeric::_048],
            [Iso31661Alpha2::BI, Iso31661Alpha3::BDI, Iso31661Numeric::_108],
            [Iso31661Alpha2::BJ, Iso31661Alpha3::BEN, Iso31661Numeric::_204],
            [Iso31661Alpha2::BL, Iso31661Alpha3::BLM, Iso31661Numeric::_652],
            [Iso31661Alpha2::BM, Iso31661Alpha3::BMU, Iso31661Numeric::_060],
            [Iso31661Alpha2::BN, Iso31661Alpha3::BRN, Iso31661Numeric::_096],
            [Iso31661Alpha2::BO, Iso31661Alpha3::BOL, Iso31661Numeric::_068],
            [Iso31661Alpha2::BQ, Iso31661Alpha3::BES, Iso31661Numeric::_535],
            [Iso31661Alpha2::BR, Iso31661Alpha3::BRA, Iso31661Numeric::_076],
            [Iso31661Alpha2::BS, Iso31661Alpha3::BHS, Iso31661Numeric::_044],
            [Iso31661Alpha2::BT, Iso31661Alpha3::BTN, Iso31661Numeric::_064],
            [Iso31661Alpha2::BV, Iso31661Alpha3::BVT, Iso31661Numeric::_074],
            [Iso31661Alpha2::BW, Iso31661Alpha3::BWA, Iso31661Numeric::_072],
            [Iso31661Alpha2::BY, Iso31661Alpha3::BLR, Iso31661Numeric::_112],
            [Iso31661Alpha2::BZ, Iso31661Alpha3::BLZ, Iso31661Numeric::_084],
            [Iso31661Alpha2::CA, Iso31661Alpha3::CAN, Iso31661Numeric::_124],
            [Iso31661Alpha2::CC, Iso31661Alpha3::CCK, Iso31661Numeric::_166],
            [Iso31661Alpha2::CD, Iso31661Alpha3::COD, Iso31661Numeric::_180],
            [Iso31661Alpha2::CF, Iso31661Alpha3::CAF, Iso31661Numeric::_140],
            [Iso31661Alpha2::CG, Iso31661Alpha3::COG, Iso31661Numeric::_178],
            [Iso31661Alpha2::CH, Iso31661Alpha3::CHE, Iso31661Numeric::_756],
            [Iso31661Alpha2::CI, Iso31661Alpha3::CIV, Iso31661Numeric::_384],
            [Iso31661Alpha2::CK, Iso31661Alpha3::COK, Iso31661Numeric::_184],
            [Iso31661Alpha2::CL, Iso31661Alpha3::CHL, Iso31661Numeric::_152],
            [Iso31661Alpha2::CM, Iso31661Alpha3::CMR, Iso31661Numeric::_120],
            [Iso31661Alpha2::CN, Iso31661Alpha3::CHN, Iso31661Numeric::_156],
            [Iso31661Alpha2::CO, Iso31661Alpha3::COL, Iso31661Numeric::_170],
            [Iso31661Alpha2::CR, Iso31661Alpha3::CRI, Iso31661Numeric::_188],
            [Iso31661Alpha2::CU, Iso31661Alpha3::CUB, Iso31661Numeric::_192],
            [Iso31661Alpha2::CV, Iso31661Alpha3::CPV, Iso31661Numeric::_132],
            [Iso31661Alpha2::CW, Iso31661Alpha3::CUW, Iso31661Numeric::_531],
            [Iso31661Alpha2::CX, Iso31661Alpha3::CXR, Iso31661Numeric::_162],
            [Iso31661Alpha2::CY, Iso31661Alpha3::CYP, Iso31661Numeric::_196],
            [Iso31661Alpha2::CZ, Iso31661Alpha3::CZE, Iso31661Numeric::_203],
            [Iso31661Alpha2::DE, Iso31661Alpha3::DEU, Iso31661Numeric::_276],
            [Iso31661Alpha2::DJ, Iso31661Alpha3::DJI, Iso31661Numeric::_262],
            [Iso31661Alpha2::DK, Iso31661Alpha3::DNK, Iso31661Numeric::_208],
            [Iso31661Alpha2::DM, Iso31661Alpha3::DMA, Iso31661Numeric::_212],
            [Iso31661Alpha2::DO, Iso31661Alpha3::DOM, Iso31661Numeric::_214],
            [Iso31661Alpha2::DZ, Iso31661Alpha3::DZA, Iso31661Numeric::_012],
            [Iso31661Alpha2::EC, Iso31661Alpha3::ECU, Iso31661Numeric::_218],
            [Iso31661Alpha2::EE, Iso31661Alpha3::EST, Iso31661Numeric::_233],
            [Iso31661Alpha2::EG, Iso31661Alpha3::EGY, Iso31661Numeric::_818],
            [Iso31661Alpha2::EH, Iso31661Alpha3::ESH, Iso31661Numeric::_732],
            [Iso31661Alpha2::ER, Iso31661Alpha3::ERI, Iso31661Numeric::_232],
            [Iso31661Alpha2::ES, Iso31661Alpha3::ESP, Iso31661Numeric::_724],
            [Iso31661Alpha2::ET, Iso31661Alpha3::ETH, Iso31661Numeric::_231],
            [Iso31661Alpha2::FI, Iso31661Alpha3::FIN, Iso31661Numeric::_246],
            [Iso31661Alpha2::FJ, Iso31661Alpha3::FJI, Iso31661Numeric::_242],
            [Iso31661Alpha2::FK, Iso31661Alpha3::FLK, Iso31661Numeric::_238],
            [Iso31661Alpha2::FM, Iso31661Alpha3::FSM, Iso31661Numeric::_583],
            [Iso31661Alpha2::FO, Iso31661Alpha3::FRO, Iso31661Numeric::_234],
            [Iso31661Alpha2::FR, Iso31661Alpha3::FRA, Iso31661Numeric::_250],
            [Iso31661Alpha2::GA, Iso31661Alpha3::GAB, Iso31661Numeric::_266],
            [Iso31661Alpha2::GB, Iso31661Alpha3::GBR, Iso31661Numeric::_826],
            [Iso31661Alpha2::GD, Iso31661Alpha3::GRD, Iso31661Numeric::_308],
            [Iso31661Alpha2::GE, Iso31661Alpha3::GEO, Iso31661Numeric::_268],
            [Iso31661Alpha2::GF, Iso31661Alpha3::GUF, Iso31661Numeric::_254],
            [Iso31661Alpha2::GG, Iso31661Alpha3::GGY, Iso31661Numeric::_831],
            [Iso31661Alpha2::GH, Iso31661Alpha3::GHA, Iso31661Numeric::_288],
            [Iso31661Alpha2::GI, Iso31661Alpha3::GIB, Iso31661Numeric::_292],
            [Iso31661Alpha2::GL, Iso31661Alpha3::GRL, Iso31661Numeric::_304],
            [Iso31661Alpha2::GM, Iso31661Alpha3::GMB, Iso31661Numeric::_270],
            [Iso31661Alpha2::GN, Iso31661Alpha3::GIN, Iso31661Numeric::_324],
            [Iso31661Alpha2::GP, Iso31661Alpha3::GLP, Iso31661Numeric::_312],
            [Iso31661Alpha2::GQ, Iso31661Alpha3::GNQ, Iso31661Numeric::_226],
            [Iso31661Alpha2::GR, Iso31661Alpha3::GRC, Iso31661Numeric::_300],
            [Iso31661Alpha2::GS, Iso31661Alpha3::SGS, Iso31661Numeric::_239],
            [Iso31661Alpha2::GT, Iso31661Alpha3::GTM, Iso31661Numeric::_320],
            [Iso31661Alpha2::GU, Iso31661Alpha3::GUM, Iso31661Numeric::_316],
            [Iso31661Alpha2::GW, Iso31661Alpha3::GNB, Iso31661Numeric::_624],
            [Iso31661Alpha2::GY, Iso31661Alpha3::GUY, Iso31661Numeric::_328],
            [Iso31661Alpha2::HK, Iso31661Alpha3::HKG, Iso31661Numeric::_344],
            [Iso31661Alpha2::HM, Iso31661Alpha3::HMD, Iso31661Numeric::_334],
            [Iso31661Alpha2::HN, Iso31661Alpha3::HND, Iso31661Numeric::_340],
            [Iso31661Alpha2::HR, Iso31661Alpha3::HRV, Iso31661Numeric::_191],
            [Iso31661Alpha2::HT, Iso31661Alpha3::HTI, Iso31661Numeric::_332],
            [Iso31661Alpha2::HU, Iso31661Alpha3::HUN, Iso31661Numeric::_348],
            [Iso31661Alpha2::ID, Iso31661Alpha3::IDN, Iso31661Numeric::_360],
            [Iso31661Alpha2::IE, Iso31661Alpha3::IRL, Iso31661Numeric::_372],
            [Iso31661Alpha2::IL, Iso31661Alpha3::ISR, Iso31661Numeric::_376],
            [Iso31661Alpha2::IM, Iso31661Alpha3::IMN, Iso31661Numeric::_833],
            [Iso31661Alpha2::IN, Iso31661Alpha3::IND, Iso31661Numeric::_356],
            [Iso31661Alpha2::IO, Iso31661Alpha3::IOT, Iso31661Numeric::_086],
            [Iso31661Alpha2::IQ, Iso31661Alpha3::IRQ, Iso31661Numeric::_368],
            [Iso31661Alpha2::IR, Iso31661Alpha3::IRN, Iso31661Numeric::_364],
            [Iso31661Alpha2::IS, Iso31661Alpha3::ISL, Iso31661Numeric::_352],
            [Iso31661Alpha2::IT, Iso31661Alpha3::ITA, Iso31661Numeric::_380],
            [Iso31661Alpha2::JE, Iso31661Alpha3::JEY, Iso31661Numeric::_832],
            [Iso31661Alpha2::JM, Iso31661Alpha3::JAM, Iso31661Numeric::_388],
            [Iso31661Alpha2::JO, Iso31661Alpha3::JOR, Iso31661Numeric::_400],
            [Iso31661Alpha2::JP, Iso31661Alpha3::JPN, Iso31661Numeric::_392],
            [Iso31661Alpha2::KE, Iso31661Alpha3::KEN, Iso31661Numeric::_404],
            [Iso31661Alpha2::KG, Iso31661Alpha3::KGZ, Iso31661Numeric::_417],
            [Iso31661Alpha2::KH, Iso31661Alpha3::KHM, Iso31661Numeric::_116],
            [Iso31661Alpha2::KI, Iso31661Alpha3::KIR, Iso31661Numeric::_296],
            [Iso31661Alpha2::KM, Iso31661Alpha3::COM, Iso31661Numeric::_174],
            [Iso31661Alpha2::KN, Iso31661Alpha3::KNA, Iso31661Numeric::_659],
            [Iso31661Alpha2::KR, Iso31661Alpha3::KOR, Iso31661Numeric::_410],
            [Iso31661Alpha2::KP, Iso31661Alpha3::PRK, Iso31661Numeric::_408],
            [Iso31661Alpha2::KW, Iso31661Alpha3::KWT, Iso31661Numeric::_414],
            [Iso31661Alpha2::KY, Iso31661Alpha3::CYM, Iso31661Numeric::_136],
            [Iso31661Alpha2::KZ, Iso31661Alpha3::KAZ, Iso31661Numeric::_398],
            [Iso31661Alpha2::LA, Iso31661Alpha3::LAO, Iso31661Numeric::_418],
            [Iso31661Alpha2::LB, Iso31661Alpha3::LBN, Iso31661Numeric::_422],
            [Iso31661Alpha2::LC, Iso31661Alpha3::LCA, Iso31661Numeric::_662],
            [Iso31661Alpha2::LI, Iso31661Alpha3::LIE, Iso31661Numeric::_438],
            [Iso31661Alpha2::LK, Iso31661Alpha3::LKA, Iso31661Numeric::_144],
            [Iso31661Alpha2::LR, Iso31661Alpha3::LBR, Iso31661Numeric::_430],
            [Iso31661Alpha2::LS, Iso31661Alpha3::LSO, Iso31661Numeric::_426],
            [Iso31661Alpha2::LT, Iso31661Alpha3::LTU, Iso31661Numeric::_440],
            [Iso31661Alpha2::LU, Iso31661Alpha3::LUX, Iso31661Numeric::_442],
            [Iso31661Alpha2::LV, Iso31661Alpha3::LVA, Iso31661Numeric::_428],
            [Iso31661Alpha2::LY, Iso31661Alpha3::LBY, Iso31661Numeric::_434],
            [Iso31661Alpha2::MA, Iso31661Alpha3::MAR, Iso31661Numeric::_504],
            [Iso31661Alpha2::MC, Iso31661Alpha3::MCO, Iso31661Numeric::_492],
            [Iso31661Alpha2::MD, Iso31661Alpha3::MDA, Iso31661Numeric::_498],
            [Iso31661Alpha2::ME, Iso31661Alpha3::MNE, Iso31661Numeric::_499],
            [Iso31661Alpha2::MF, Iso31661Alpha3::MAF, Iso31661Numeric::_663],
            [Iso31661Alpha2::MG, Iso31661Alpha3::MDG, Iso31661Numeric::_450],
            [Iso31661Alpha2::MH, Iso31661Alpha3::MHL, Iso31661Numeric::_584],
            [Iso31661Alpha2::MK, Iso31661Alpha3::MKD, Iso31661Numeric::_807],
            [Iso31661Alpha2::ML, Iso31661Alpha3::MLI, Iso31661Numeric::_466],
            [Iso31661Alpha2::MM, Iso31661Alpha3::MMR, Iso31661Numeric::_104],
            [Iso31661Alpha2::MN, Iso31661Alpha3::MNG, Iso31661Numeric::_496],
            [Iso31661Alpha2::MO, Iso31661Alpha3::MAC, Iso31661Numeric::_446],
            [Iso31661Alpha2::MP, Iso31661Alpha3::MNP, Iso31661Numeric::_580],
            [Iso31661Alpha2::MQ, Iso31661Alpha3::MTQ, Iso31661Numeric::_474],
            [Iso31661Alpha2::MR, Iso31661Alpha3::MRT, Iso31661Numeric::_478],
            [Iso31661Alpha2::MS, Iso31661Alpha3::MSR, Iso31661Numeric::_500],
            [Iso31661Alpha2::MT, Iso31661Alpha3::MLT, Iso31661Numeric::_470],
            [Iso31661Alpha2::MU, Iso31661Alpha3::MUS, Iso31661Numeric::_480],
            [Iso31661Alpha2::MV, Iso31661Alpha3::MDV, Iso31661Numeric::_462],
            [Iso31661Alpha2::MW, Iso31661Alpha3::MWI, Iso31661Numeric::_454],
            [Iso31661Alpha2::MX, Iso31661Alpha3::MEX, Iso31661Numeric::_484],
            [Iso31661Alpha2::MY, Iso31661Alpha3::MYS, Iso31661Numeric::_458],
            [Iso31661Alpha2::MZ, Iso31661Alpha3::MOZ, Iso31661Numeric::_508],
            [Iso31661Alpha2::NA, Iso31661Alpha3::NAM, Iso31661Numeric::_516],
            [Iso31661Alpha2::NC, Iso31661Alpha3::NCL, Iso31661Numeric::_540],
            [Iso31661Alpha2::NE, Iso31661Alpha3::NER, Iso31661Numeric::_562],
            [Iso31661Alpha2::NF, Iso31661Alpha3::NFK, Iso31661Numeric::_574],
            [Iso31661Alpha2::NG, Iso31661Alpha3::NGA, Iso31661Numeric::_566],
            [Iso31661Alpha2::NI, Iso31661Alpha3::NIC, Iso31661Numeric::_558],
            [Iso31661Alpha2::NL, Iso31661Alpha3::NLD, Iso31661Numeric::_528],
            [Iso31661Alpha2::NO, Iso31661Alpha3::NOR, Iso31661Numeric::_578],
            [Iso31661Alpha2::NP, Iso31661Alpha3::NPL, Iso31661Numeric::_524],
            [Iso31661Alpha2::NR, Iso31661Alpha3::NRU, Iso31661Numeric::_520],
            [Iso31661Alpha2::NU, Iso31661Alpha3::NIU, Iso31661Numeric::_570],
            [Iso31661Alpha2::NZ, Iso31661Alpha3::NZL, Iso31661Numeric::_554],
            [Iso31661Alpha2::OM, Iso31661Alpha3::OMN, Iso31661Numeric::_512],
            [Iso31661Alpha2::PA, Iso31661Alpha3::PAN, Iso31661Numeric::_591],
            [Iso31661Alpha2::PE, Iso31661Alpha3::PER, Iso31661Numeric::_604],
            [Iso31661Alpha2::PF, Iso31661Alpha3::PYF, Iso31661Numeric::_258],
            [Iso31661Alpha2::PG, Iso31661Alpha3::PNG, Iso31661Numeric::_598],
            [Iso31661Alpha2::PH, Iso31661Alpha3::PHL, Iso31661Numeric::_608],
            [Iso31661Alpha2::PK, Iso31661Alpha3::PAK, Iso31661Numeric::_586],
            [Iso31661Alpha2::PL, Iso31661Alpha3::POL, Iso31661Numeric::_616],
            [Iso31661Alpha2::PM, Iso31661Alpha3::SPM, Iso31661Numeric::_666],
            [Iso31661Alpha2::PN, Iso31661Alpha3::PCN, Iso31661Numeric::_612],
            [Iso31661Alpha2::PR, Iso31661Alpha3::PRI, Iso31661Numeric::_630],
            [Iso31661Alpha2::PS, Iso31661Alpha3::PSE, Iso31661Numeric::_275],
            [Iso31661Alpha2::PT, Iso31661Alpha3::PRT, Iso31661Numeric::_620],
            [Iso31661Alpha2::PW, Iso31661Alpha3::PLW, Iso31661Numeric::_585],
            [Iso31661Alpha2::PY, Iso31661Alpha3::PRY, Iso31661Numeric::_600],
            [Iso31661Alpha2::QA, Iso31661Alpha3::QAT, Iso31661Numeric::_634],
            [Iso31661Alpha2::RE, Iso31661Alpha3::REU, Iso31661Numeric::_638],
            [Iso31661Alpha2::RO, Iso31661Alpha3::ROU, Iso31661Numeric::_642],
            [Iso31661Alpha2::RS, Iso31661Alpha3::SRB, Iso31661Numeric::_688],
            [Iso31661Alpha2::RU, Iso31661Alpha3::RUS, Iso31661Numeric::_643],
            [Iso31661Alpha2::RW, Iso31661Alpha3::RWA, Iso31661Numeric::_646],
            [Iso31661Alpha2::SA, Iso31661Alpha3::SAU, Iso31661Numeric::_682],
            [Iso31661Alpha2::SB, Iso31661Alpha3::SLB, Iso31661Numeric::_090],
            [Iso31661Alpha2::SC, Iso31661Alpha3::SYC, Iso31661Numeric::_690],
            [Iso31661Alpha2::SD, Iso31661Alpha3::SDN, Iso31661Numeric::_736],
            [Iso31661Alpha2::SE, Iso31661Alpha3::SWE, Iso31661Numeric::_752],
            [Iso31661Alpha2::SG, Iso31661Alpha3::SGP, Iso31661Numeric::_702],
            [Iso31661Alpha2::SH, Iso31661Alpha3::SHN, Iso31661Numeric::_654],
            [Iso31661Alpha2::SI, Iso31661Alpha3::SVN, Iso31661Numeric::_705],
            [Iso31661Alpha2::SJ, Iso31661Alpha3::SJM, Iso31661Numeric::_744],
            [Iso31661Alpha2::SK, Iso31661Alpha3::SVK, Iso31661Numeric::_703],
            [Iso31661Alpha2::SL, Iso31661Alpha3::SLE, Iso31661Numeric::_694],
            [Iso31661Alpha2::SM, Iso31661Alpha3::SMR, Iso31661Numeric::_674],
            [Iso31661Alpha2::SN, Iso31661Alpha3::SEN, Iso31661Numeric::_686],
            [Iso31661Alpha2::SO, Iso31661Alpha3::SOM, Iso31661Numeric::_706],
            [Iso31661Alpha2::SR, Iso31661Alpha3::SUR, Iso31661Numeric::_740],
            [Iso31661Alpha2::SS, Iso31661Alpha3::SSD, Iso31661Numeric::_728],
            [Iso31661Alpha2::ST, Iso31661Alpha3::STP, Iso31661Numeric::_678],
            [Iso31661Alpha2::SV, Iso31661Alpha3::SLV, Iso31661Numeric::_222],
            [Iso31661Alpha2::SX, Iso31661Alpha3::SXM, Iso31661Numeric::_534],
            [Iso31661Alpha2::SY, Iso31661Alpha3::SYR, Iso31661Numeric::_760],
            [Iso31661Alpha2::SZ, Iso31661Alpha3::SWZ, Iso31661Numeric::_748],
            [Iso31661Alpha2::TC, Iso31661Alpha3::TCA, Iso31661Numeric::_796],
            [Iso31661Alpha2::TD, Iso31661Alpha3::TCD, Iso31661Numeric::_148],
            [Iso31661Alpha2::TF, Iso31661Alpha3::ATF, Iso31661Numeric::_260],
            [Iso31661Alpha2::TG, Iso31661Alpha3::TGO, Iso31661Numeric::_768],
            [Iso31661Alpha2::TH, Iso31661Alpha3::THA, Iso31661Numeric::_764],
            [Iso31661Alpha2::TJ, Iso31661Alpha3::TJK, Iso31661Numeric::_762],
            [Iso31661Alpha2::TK, Iso31661Alpha3::TKL, Iso31661Numeric::_772],
            [Iso31661Alpha2::TL, Iso31661Alpha3::TLS, Iso31661Numeric::_626],
            [Iso31661Alpha2::TM, Iso31661Alpha3::TKM, Iso31661Numeric::_795],
            [Iso31661Alpha2::TN, Iso31661Alpha3::TUN, Iso31661Numeric::_788],
            [Iso31661Alpha2::TO, Iso31661Alpha3::TON, Iso31661Numeric::_776],
            [Iso31661Alpha2::TR, Iso31661Alpha3::TUR, Iso31661Numeric::_792],
            [Iso31661Alpha2::TT, Iso31661Alpha3::TTO, Iso31661Numeric::_780],
            [Iso31661Alpha2::TV, Iso31661Alpha3::TUV, Iso31661Numeric::_798],
            [Iso31661Alpha2::TW, Iso31661Alpha3::TWN, Iso31661Numeric::_158],
            [Iso31661Alpha2::TZ, Iso31661Alpha3::TZA, Iso31661Numeric::_834],
            [Iso31661Alpha2::UA, Iso31661Alpha3::UKR, Iso31661Numeric::_804],
            [Iso31661Alpha2::UG, Iso31661Alpha3::UGA, Iso31661Numeric::_800],
            [Iso31661Alpha2::UM, Iso31661Alpha3::UMI, Iso31661Numeric::_581],
            [Iso31661Alpha2::US, Iso31661Alpha3::USA, Iso31661Numeric::_840],
            [Iso31661Alpha2::UY, Iso31661Alpha3::URY, Iso31661Numeric::_858],
            [Iso31661Alpha2::UZ, Iso31661Alpha3::UZB, Iso31661Numeric::_860],
            [Iso31661Alpha2::VA, Iso31661Alpha3::VAT, Iso31661Numeric::_336],
            [Iso31661Alpha2::VC, Iso31661Alpha3::VCT, Iso31661Numeric::_670],
            [Iso31661Alpha2::VE, Iso31661Alpha3::VEN, Iso31661Numeric::_862],
            [Iso31661Alpha2::VG, Iso31661Alpha3::VGB, Iso31661Numeric::_092],
            [Iso31661Alpha2::VI, Iso31661Alpha3::VIR, Iso31661Numeric::_850],
            [Iso31661Alpha2::VN, Iso31661Alpha3::VNM, Iso31661Numeric::_704],
            [Iso31661Alpha2::VU, Iso31661Alpha3::VUT, Iso31661Numeric::_548],
            [Iso31661Alpha2::WF, Iso31661Alpha3::WLF, Iso31661Numeric::_876],
            [Iso31661Alpha2::WS, Iso31661Alpha3::WSM, Iso31661Numeric::_882],
            [Iso31661Alpha2::XK, Iso31661Alpha3::XKX, Iso31661Numeric::_926],
            [Iso31661Alpha2::YE, Iso31661Alpha3::YEM, Iso31661Numeric::_887],
            [Iso31661Alpha2::YT, Iso31661Alpha3::MYT, Iso31661Numeric::_175],
            [Iso31661Alpha2::ZA, Iso31661Alpha3::ZAF, Iso31661Numeric::_710],
            [Iso31661Alpha2::ZM, Iso31661Alpha3::ZMB, Iso31661Numeric::_894],
            [Iso31661Alpha2::ZW, Iso31661Alpha3::ZWE, Iso31661Numeric::_716],
        ];
    }
}