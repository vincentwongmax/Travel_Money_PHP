<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>

       
        var wtf = [{
            'name': '建',
            'money': -100,
        }, {
            'name': '你好',
            'money': -74.33333334,
        }, {
            'name': '123',
            'money': -66.66667,
        }, {
            'name': '好哦',
            'money': -41,
        }, {
            'name': '文',
            'money': -33.33336,
        }, {
            'name': '邊個',
            'money': 0,
        }, {
            'name': '黃',
            'money': 105.1666666,
        }, {
            'name': 'BBB',
            'money': 213,
        }, {
            'name': '好的',
            'money': 10,
        }];
      
        let people=wtf.length-1;
        for (i = 0; i <= people; i++) //print 人數 
        {   
            if (wtf[people].money > wtf[i].money) {
                var x, y, z;
                x = wtf[i].money;
                y = wtf[people].money;
                z = x + y;
                wtf[i].money = wtf[people].money + wtf[i].money;
                console.log(`${wtf[people].name} to ${wtf[i].name} `);
                if (wtf[i].money != 0) {
                    i = i - 1;
                }

                if (z > 0) {
                    wtf[people].money = z;
                   // console.log('step1');
                    console.log(`${x*-1} 元`);
                    z = 0;
                } else {
                    people = people - 1;
                  //  console.log('step2');
                    console.log(`${y} 元`);
                }
            }
        }
        





















        // let wtfCount=wtf;

        //    for (let apple=0; let i = 0; i < wtfCount.length; i++) {
        //      //  console.log(`i= ${i}`);
        //       let  familyFirstJson = wtfCount[i]; //第一個json 變數
        //       //console.log('第一個JSON 是');
        //    //    console.log('1');
        //    //    console.log(familyFirstJson);
        //    //    console.log(`-------------`);
        //       let familyLastJson= wtfCount[(wtfCount.length-1)-apple] ;  //最後一個json 變數
        //      //  console.log('最後一個JSON 是');
        //       // console.log(familyLastJson);
        //        // wtf[flength]

        //           if(familyLastJson.money > familyFirstJson.money)
        //           { 
        //            // console.log(`familyFirstJson.money    ${i}`);
        //            //    console.log(familyFirstJson.money);
        //            //   console.log(`familyLastJson.money    ${i}`);
        //            //    console.log(familyLastJson.money);


        //              let lastNamemoney = familyLastJson.money +  familyFirstJson.money ;
        //             // console.log("lastNammoney 出黎");
        //             // console.log(lastNamemoney);

        //            //   if(lastNamemoney < 0){

        //                 let pay=familyLastJson.money;
        //                 familyFirstJson.money=lastNamemoney;
        //                 familyLastJson.money = 0;
        //                console.log(`"${familyFirstJson.name}" TO  "${familyLastJson.name}"   元`);

        //                console.log(`${familyFirstJson.name}目前有  ${familyFirstJson.money}`);
        //                console.log(`${familyLastJson.name}目前有  ${familyLastJson.money}`);
        //                i=i-1;
        //             //   apple= apple -1 ;
        //                // console.log('2');
        //                // console.log(familyFirstJson);
        //                // console.log(`-------------`);
        //               // }
        //                //else{
        //            //     //  familyFirstJson.money=0;
        //            //     //  familyLastJson.money=lastNamemoney;
        //            //     //  console.log(`${familyFirstJson.name} TO  ${familyLastJson.name}  ${familyFirstJson.money} 元`);
        //            //    }
        //          // }
        //    }
    </script>
</body>

</html>