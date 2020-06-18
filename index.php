<head>
    <meta charset="UTF-8">
    <title>旅行用記帳器</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
</head>

<body>
    <H1>旅行用記帳平分器 測試版V.0.004</H1>

    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    新增入物
  </button>

    <div id="payMainMoneyPeople">
        <h2>請輸入或建立</h2>
        <input id="ecToken" required="required" type="text" name="token" placeholder="請輸入或建立" />
        <button type="button" class="btn btn-outline-info" onclick="enterToken();">輸入</button>
        <button type="button" class="btn btn-outline-info" onclick="createToken()">建立</button>

  
    </div>
    <br>
    <div class="collapse" id="collapseExample">
  
  <h2>請輸入以建立人物名稱</h2>
    <input id="createName" type="text" name="token" placeholder="請輸入或建立" />
    <button type="button" class="btn btn-outline-info" onclick="createName()">輸入</button>
  
</div>

    <h1> 目前人物成員有:
        <a id="number"> </a>
        <h2 id="nameShow"></h2>
    </h1>

    <br><br>

    <div id="payMainMoneyPeople">
        <h1>付錢人(單選)</h1>
        <h3 id="payMainMoneyPeople2"></h3>
        </h1>
    </div>
    <br><br>
    <h2>請輸入付款多少錢</h2>
    <input id="howmuchmoney" required="required" type="text" placeholder="請輸入付款多少錢"> </input>
    <br><br>

    <div id="userMoneyPeople">
        <h1>受益人(可多選)</h1>
        <h3 id="userMoneyPeople2"></h3>
        </h1>
    </div>

    <input type="button" class="btn btn-outline-info" value="提交" onclick="getAll()"><br />


    <br><br><br>

    <table id="showWaterBill" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">paymoneypeople</th>
                <th scope="col">usermoneypeople</th>
                <th scope="col">howmuchmoney</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <br>
   
    <h4 id="showPersonMoney"></h4>
    <br><br><br>

    
    <h4 id="paypaypay"></h4>

    </br>
    <script>
        let getUrlString = location.href;
        let url = new URL(getUrlString);
        let get = url.searchParams.get('token');

        if (get == null || get == '') {
        //     abc();
        // } else {
        //     document.getElementById('ecToken').value = get;
        //     enterToken();
        }else{
            document.getElementById('ecToken').value = get;
        }
       
        // function abc() {
        //     var input = prompt("請輸入token");

        //     if (input == null || input == '') {
        //         abc();
        //     } else {
        //         document.getElementById('ecToken').value = input;
        //         input = "";
        //         enterToken();
        //     }
        // }
        // if (get == null || get == '') {
        //     abc();
        // } else {
        //     document.getElementById('ecToken').value = get;
        //     enterToken();
        // }


        var userMoneyPeople;
        var payMainMoneyPeople;
        var createNamee;

        function getAll() {
            let payMainMoneyPeople = $('input:radio[name="box"]:checked').map(function () {
                return $(this).val();
            }).get().join(",");
            let userMoneyPeople = $('input:checkbox[name="boxs"]:checked').map(function () {
                return $(this).val();
            }).get().join(",");
            let howmuchmoney = $('#howmuchmoney').val();
            dataToDB(payMainMoneyPeople, userMoneyPeople, howmuchmoney);
            show($('#ecToken').val());
            $('#howmuchmoney').empty;
        }
        function enterToken() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'enterToken',
                        ecToken: $('#ecToken').val(),
                    },
                })
                .then(function (response) {
                    
                    show($('#ecToken').val());
                    //   console.log(response.data[0]);
                    if (response.data[0] == undefined) {
                        if (confirm('沒有DATA, 建立新的TOEKN?')) {
                            createToken()
                        }
                    } else {
                        createNamee = $('#ecToken').val();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function createToken() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'createToken',
                        ecToken: $('#ecToken').val(),
                    },
                })
                .then(function (response) {
                    if (response.request.response == 'NO') {
                        console.log(response.request.response);
                        alert('重覆');
                        return;
                    }
                    createNamee = $('#ecToken').val();
                    alert('建立成功');
                    show($('#ecToken').val());
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        var families = [{
            'name': '',
            'money': 0,
        }, ];

        let show = (token) => {
            axios.post('testdb2.php', {
                    data: {
                        action: 'member',
                        ecToken: token,
                    },
                })
                .then(function (response) {
                    showWaterBill();
                    item = [];
                    item2 = [];
                    item3 = [];

                    for (let i = 0, len = response.data.length; i < len; i++) {
                        number++;
                        item.push(
                            `
                                        <tr> 
                                            <td>${i+1}. </td>
                                            <td>${response.data[i].mainpeople}</td>
                                        </tr>
                            `
                        );
                        if (families[i] == undefined) {
                            families[i] = [];
                        }
                        families[i].name = response.data[i].mainpeople;
                        families[i].money = 0;
                    }
                    $('#number').html(`${response.data.length}位`);
                    $('#nameShow').html(item.join(''));

                    for (let i = 0, len = response.data.length; i < len; i++) {
                        number++;
                        item2.push(
                            `
                                <tr>
                                    <td>${response.data[i].mainpeople} ： <td>
                                    <td><input type="radio" name="box" value="${response.data[i].mainpeople}"/><td>
                                </tr>
                                `
                        );
                    }
                    $('#payMainMoneyPeople2').html(item2.join(''));

                    for (let i = 0, len = response.data.length; i < len; i++) {
                        number++;
                        item3.push(
                            `
                                <tr>
                                    <td>${response.data[i].mainpeople} ： <td>
                                    <td><input type="checkbox" name="boxs" value="${response.data[i].mainpeople}"/><td>
                                </tr>
                                `
                        );
                    }
                    $('#userMoneyPeople2').html(item3.join(''));
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function createName() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'createName',
                        mainpeople: $('#createName').val(),
                        token: createNamee,
                    },
                })
                .then(function (response) {
                    
                    createName2 = $('#createName').val();
                    $('#nameShow').append(`<tr><td>${createName2}</td></tr>`);
                    alert('DONE');
                    show($('#ecToken').val());
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function dataToDB(payMainMoneyPeople, userMoneyPeople, howmuchmoney) {
            axios.post('testdb2.php', {
                    data: {
                        action: 'dataToDB',
                        payMainMoneyPeople: payMainMoneyPeople,
                        userMoneyPeople: userMoneyPeople,
                        howmuchmoney: howmuchmoney,
                        token: createNamee,
                    },
                })
                .then(function (response) {
                    console.log('dataToDB test');
                    console.log(response.request.responseText);
                    if (response.request.responseText == 'NOOOOOOO') {
                        console.log(response);
                        alert('有錯哦');
                        return;
                    }
                    alert('DONE');
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function showWaterBill() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'showWaterBill',
                        ecToken: $('#ecToken').val(),
                    },
                })
                .then(function (response) {
                    item = [];
                    for (let i = 0, len = response.data.length; i < len; i++) {
                        item.push(
                            `
                                    <tr>
                                        <th scope="row">${i}</th>
                                        <td>${response.data[i].paymoneypeople}</td>
                                        <td>${response.data[i].usemoneypeople}</td>
                                        <td>${response.data[i].howmuchmoney}</td>
                                    </tr>
                            `
                        );
                    }
                    $('#showWaterBill > tbody').html(item.join(''));
                    showWaterBillAccount(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
     
        function showWaterBillAccount(msg) {
            for (let i = 0, len = msg.length; i < len; i++) {

                let paymoneypeople2 = msg[i].paymoneypeople;
                let usemoneypeople2 = msg[i].usemoneypeople.split(',');
                let howmuchmoney2 = msg[i].howmuchmoney;

                for (let i = 0; i < families.length; i++) { //付錢人錢相加
                    families[i].money = families[i].money;

                    if (families[i].name == paymoneypeople2) {
                        families[i].money = families[i].money + howmuchmoney2;
                    }

                    for (let pp = 0; pp < usemoneypeople2.length; pp++) {
                        if (families[i].name == usemoneypeople2[pp]) {
                            families[i].money = families[i].money - (howmuchmoney2 / usemoneypeople2.length)
                        }
                    }
                }
            }

           abc =families;
           $('#showPersonMoney').empty();
           $('#showPersonMoney').append(`<h3 style="color:cadetblue"> 目前每個人的錢 </h3>`)
           families.forEach(element => {
           $('#showPersonMoney').append(`${element.name} =>  ${element.money} <br>`)
         });

            families.forEach(element => {
            element.money = element.money * -1;
         });

            sortByKey(families, 'money'); //json, 排序用的key
            $('#paypaypay').empty();
            $('#paypaypay').append(`<h3 style="color:brown" > 請跟據指示進行付款 </h3>`);
            wtfwhocare(families);
        }

        function sortByKey(array, key) { //排序JSON 
            return array.sort(function (a, b) {
                var x = a[key];
                var y = b[key];
                return ((x < y) ? -1 : ((x > y) ? 1 : 0));
            });
        }

        function wtfwhocare(wtf) {
        let people=wtf.length-1;

            for (let i = 0; i <= people; i++) //print 人數 
            {   
                if (wtf[people].money > wtf[i].money) {
                    let  x, y, z;
                    x = wtf[i].money;
                    y = wtf[people].money;
                    z = x + y;
                    wtf[i].money = wtf[people].money + wtf[i].money;

                    $('#paypaypay').append(`${wtf[people].name} ==>${wtf[i].name}`);
                    if (wtf[i].money != 0) {
                        i = i - 1;
                    }
                    if (z > 0) {
                        wtf[people].money = z;
                        $('#paypaypay').append(`<p style="color:red" >${x*-1} 元<br></p>`);
                        z = 0;
                    } else {
                        people = people - 1;
                        $('#paypaypay').append(`<p style="color:red" >${y} 元<br></p>`);
                    }
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>
 