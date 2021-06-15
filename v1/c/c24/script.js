let sortPositive = arr => {
    let test = arr.filter(item => item > 0);
    test.sort((a, b) => a-b);
    arr.forEach((item, index) => {
       if(item < 0)
       {
           test.splice(index, 0, item);
       }
    });

    console.log(test);
};

/*TESTS FOR AVALIATIONS*/

sortPositive([-2, 150, 190, 170, -3, -4, 160, 180]);
sortPositive([-1, -1, -1, -1, -1]);
sortPositive([-1]);
sortPositive([4, 2, 9, 11, 2, 16]);
sortPositive([2, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 1]);
sortPositive([23, 54, -1, 43, 1, -1, -1, 77, -1, -1, -1, 3]);
