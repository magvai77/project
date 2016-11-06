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
                                $role = snmp2_get($swip, 'public', $roleOid . $ports[$key2] . $endRoleOid, 20000);
                                $cost = snmp2_get($swip, 'public', $costOid . $ports[$key2], 20000);
                                ${'port' . $ports[$key2] . 'role'} = intval(str_replace("INTEGER:", "", $role));
                                ${'port' . $ports[$key2] . 'cost'} = intval(str_replace("INTEGER:", "", $cost));

                                $array[$elem[0]][$swname][$ports[$key2]] = [
                                        'role' => ${'port' . $ports[$key2] . 'role'},
                                        'cost' => ${'port' . $ports[$key2] . 'cost'}
                                ];
                        }
                }
        }
        var_dump($array);
}

stpGet($swArray);

