<?php
require __DIR__ . '/config.php';

$file = __DIR__ . '/a4.csv';

function getSwArray($file)
{
        $swlist = fopen($file, "r");
                while (($row = fgets($swlist)) !== false) {
                        $b = explode('|', $row);
                        $swArray[] = [
                                'swname'  =>  $b[4],
                                'swip'  =>  $b[2],
                                'swTemplateId'  =>  $b[5]
                        ];
                }
        fclose($swlist);
        return $swArray;
}

$swArray = getSwArray($file);

function stpGet($swArray)
{
        foreach ($swArray as $key => $value) {
                $swip = trim($swArray[$key]['swip']);
                $swname = trim($swArray[$key]['swname']);
                $patternArray = getPattern($swArray[$key]['swTemplateId']);
                preg_match('/\d{5,}/', $swname, $elem);

                foreach ($patternArray as $key1 => $value1) {
                        $costOid = $patternArray[$key1]['costPattern'];
                        $roleOid = $patternArray[$key1]['rolePattern'];
                        $endRoleOid = $patternArray[$key1]['endRolePattern'];
                        $ports = explode(',', $patternArray[$key1]['ports']);

                        foreach ($ports as $key2 => $value2) {
                                $mesStartPort = 73;
                                $mesPortToDlink = 48;
                                $defaultCost = 19;
                                $defaultRole = 1;
                                $role = snmp2_get($swip, 'public', $roleOid . $ports[$key2] . $endRoleOid, 20000);
                                $cost = snmp2_get($swip, 'public', $costOid . $ports[$key2], 20000);

                                if ($ports[$key2] >= $mesStartPort) {
                                        $port = $ports[$key2] - $mesPortToDlink;
                                        $portRole = ($role != false) ? intval(str_replace("INTEGER:", "", $role)) - 1 : $defaultRole;
                                        $portCost = ($cost != false) ? intval(str_replace("INTEGER:", "", $cost)) : $defaultCost;
                                } else {
                                        $port = $ports[$key2];
                                        $portRole = ($role != false) ? intval(str_replace("INTEGER:", "", $role)) : $defaultRole;
                                        $portCost = ($cost != false) ? intval(str_replace("INTEGER:", "", $cost)) : $defaultCost;                                       
                                }

                                $array[$elem[0]][$swname][$port] = [
                                        'role' => $portRole,
                                        'cost' => $portCost
                                ];
                        }
                }
        }
        return $array;
}

$stpArray = stpGet($swArray);

function stpElem($stpArray)
{
        foreach ($stpArray as $elem => $value) {
                $elemId = $elem;
                $elemArray[] = $elemId;

                foreach ($stpArray[$elem] as $switch => $value1) {
                        $swName = $switch;

                        foreach ($stpArray[$elem][$switch] as $ports => $value2) {
                                $port = $ports;

                                if (in_array(1, $stpArray[$elem][$switch][$ports], true)) {
                                        $costAlternate = $stpArray[$elemId][$swName][$port]['cost'];
                                        $altArray[] = $elemId;
                                }
                        }
                }
        }
        $breakstp = array_diff($elemArray, $altArray);
        $result = implode(', ', $breakstp);
        echo $result;
}

stpElem($stpArray);
