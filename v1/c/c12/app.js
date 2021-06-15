function testC(str) {
    if(str.match(/%.$/))
    {
        let test = str.match(/%(..)$/);
        console.log(test);
    }
    let result = eval(str);

    console.log('Result: ', result);
}

testC('1+2*3');
testC('3^2%5');
testC('(-1-2)^3/9');
