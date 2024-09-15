function calculateMean(data)
{
    if (data.length === 0) return 0;
    const sum = data.reduce((acc, val) => acc + val, 0);
    return sum / data.length;
}

function calculateMedian(data) 
{
    if (data.length === 0) return 0;
    data.sort((a, b) => a - b);
    const mid = Math.floor(data.length / 2);
    if (data.length % 2 === 0) {
        return (data[mid - 1] + data[mid]) / 2;
    } else {
        return data[mid];
    }
}

// function calculateStatistics(statisik)
// {
//     if (data.length === 0) return 0;
//     data.sort((a,b) => {{ data }});
//     const id = Math.floor(data.length / 2);
//     let mode = 0;
//     for (const num of data) {
//         frequency[num] = (frequency[num] || 0) + 1;
//         {
//             for (const key in statisik) {
//                 if (mode[key] === maxFreq);
               
//             }
//         }
//     }
// }

function calculateMode(data) {
    if (data.length === 0) return [];
    const frequency = {};
    let maxFreq = 0;
    let modes = [];
    for (const num of data) {
        frequency[num] = (frequency[num] || 0) + 1;
        if (frequency[num] > maxFreq) {
            maxFreq = frequency[num];
        }
    }
    for (const key in frequency) {
        if (frequency[key] === maxFreq) {
            modes.push(Number(key));
        }
    }
    return modes;
}

function calculateRange(data) {
    if (data.length === 0) return 0;
    const min = Math.min(...data);
    const max = Math.max(...data);
    return max - min;
}

function calculateStandardDeviation(data) {
    if (data.length === 0) return 0;
    const mean = calculateMean(data);
    const variance = data.reduce((acc, val) => acc + Math.pow(val - mean, 2), 0) / data.length;
    return Math.sqrt(variance);
}

function calculateStatistics(data) {
    if (!Array.isArray(data) || data.some(isNaN)) {
        throw new Error('Data harus berupa array angka');
    }

    const sortedData = [...data].sort((a, b) => a - b);
    
    return {
        mean: calculateMean(sortedData),
        median: calculateMedian(sortedData),
        mode: calculateMode(sortedData),
        range: calculateRange(sortedData),
        standardDeviation: calculateStandardDeviation(sortedData)
    };
}

const sampleData = [2, 4, 4, 6, 8, 10, 12, 12, 12, 14, 16, 18, 20];
const stats = calculateStatistics(sampleData);

console.log('Mean:', stats.mean);
console.log('Median:', stats.median);
console.log('Mode:', stats.mode);
console.log('Range:', stats.range);
console.log('Standard Deviation:', stats.standardDeviation);
