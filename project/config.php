<?php
function getPattern($swTemplateId)
{
    switch ($swTemplateId)
    {
        case 28271://Template SNMP A4 - DES-3052
        case 28244://Template SNMP A4 - DES-3552
        case 10143://Template SNMP A4 - DES-3200-52
        case 23601://Template SNMP A4 - DES-3200-52C1
            $patternArray = [
                    '49-52' => [
                            'ports' => '49,50,51,52',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

        case 28231://Template SNMP A4 - DES-3526
        case 10145://Template SNMP A4 - DES-3226
            $patternArray = [
                    '25-26' => [
                            'ports' => '25,26',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

        case 29692://Template SNMP A4 - DGS-3000-26TC
            $patternArray = [
                    '23-26' => [
                            'ports' => '23,24,25,26',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

        case 28232://Template SNMP A4 - DES-3550
            $patternArray = [
                    '49-50' => [
                            'ports' => '49,50',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

        case 28209://Template SNMP A4 - DES-3200-28C1ME
        case 28204://Template SNMP A4 - DES-3200-28
        case 28207://Template SNMP A4 - DES-3528
        case 26165://Template SNMP A4 - DES-3200-28C1_F
        case 10141://Template SNMP A4 - DES-3200-28ME
        case 10140://Template SNMP A4 - DES-3200-28F
        case 23226://Template SNMP A4 - DES-3200-28C1
        case 10097://Template SNMP A4 - DES-3028
            $patternArray = [
                    '25-28' => [
                            'ports' => '25,26,27,28',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

        case 28747://Template SNMP A4 - MES2124MB
        case 30262://Template SNMP A4 - MES2124M
        case 31345://Template SNMP A4 - MES2124F

            $patternArray = [
                    '25-28' => [
                            'ports' => '73,74,75,76',
                            'costPattern' => '1.3.6.1.2.1.17.2.15.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.89.57.2.13.1.7.',
                            'endRolePattern' => ''
                    ],
            ];
                return $patternArray;
                break;

        case 10144://Template SNMP A4 - DGS-3120-24TC
            $patternArray = [
                    '21-24' => [
                            'ports' => '21,22,23,24',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

        case 23600://Template SNMP A4 - DES-3200-10C1
        case 10148://Template SNMP A4 - DES-3200-10
            $patternArray = [
                    '09-10' => [
                            'ports' => '9,10',
                            'costPattern' => '1.3.6.1.4.1.171.12.15.2.4.1.5.',
                            'rolePattern' => '1.3.6.1.4.1.171.12.15.2.5.1.7.',
                            'endRolePattern' => '.0'
                    ],
            ];
                return $patternArray;
                break;

            default:
            return [];
                break;
    }
}
