let sortPositive = arr => {
    let positive = arr.filter(i => i > 0)
    positive = positive.sort((a, b) => {
        return a < b;
    })
    let i = 0;

    for (let j = 0; j < arr.length; j++) {
        if(arr[j] > 0) {
            arr[j] = positive[i];
            i++;
        }
    }

    console.log(arr)
}

/*TESTS FOR AVALIATIONS*/

sortPositive([-2, 150, 190, 170, -3, -4, 160, 180]);
sortPositive([-1, -1, -1, -1, -1]);
sortPositive([-1]);
sortPositive([4, 2, 9, 11, 2, 16]);
sortPositive([2, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 1]);
sortPositive([23, 54, -1, 43, 1, -1, -1, 77, -1, -1, -1, 3]);