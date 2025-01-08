<php
function getYearWhereMostPeopleLived(array $periodOfYears): array
{
    $yearCounter = [];
    $check1 = array_filter($periodOfYears, function ($period) {
       return count($period) !== 2;
    });
    if(!empty($check1)) {
        return [];
    }


    foreach ($periodOfYears as $period) {
        list($startPeriod, $endPeriod) = $period;
        if ($startPeriod > $endPeriod) {
            return [];
        }
        for($year = $startPeriod; $year <= $endPeriod; $year++) {
            if (!isset($yearCounter[$year])) {
                $yearCounter[$year] = 0;
            }
            $yearCounter[$year] += 1;
        }
    }
    $maxYearCount = max($yearCounter);
    # echo "Max counter: \n";
    # print_r($yearCounter);
    return array_keys($yearCounter, $maxYearCount, true);

}

$dataInputA = [[1951, 2018], [1981, 2000], [1983, 1984]];
$dataInputB = [[1951, 2018], [1981, 2000], [1980, 1982], [1983, 1984]];

$result = getYearWhereMostPeopleLived($dataInputA);
$result2 = getYearWhereMostPeopleLived($dataInputB);
print_r($result);
print_r($result2);
