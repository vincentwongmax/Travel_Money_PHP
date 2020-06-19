<head>
    <meta charset="UTF-8">
    <title>旅行用記帳器</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>
    <!-- <div class="d1">
        <div class="d2">
            <div class="d3">
                <label><input type="checkbox" checked><span>焼豚</span></label>
                
       <label><input type="checkbox" checked><span>メンマ</span></label>
                
      <label><input type="checkbox"><span>ニンニク</span></label>
                
       <label><input type="checkbox" checked><span>ねぎ</span></label>
                
       <label><input type="checkbox"><span>味玉</span></label>
            </div>
        </div>
        <div class="d2">
            <div class="d3">
                <label><input type="radio" name="m3"><span>バリカタ
                    </span></label><label><input type="radio" name="m3" checked><span>硬め
                    </span></label><label><input type="radio" name="m3"><span>普通
                    </span></label><label><input type="radio" name="m3"><span>柔らかめ
                    </span></label>
            </div>
        </div>
    </div> -->


    <H1>旅行用記帳平分器 測試版V.0.009</H1>



    <div id="payMainMoneyPeople" >
        <h2><mark>1. 請輸入或建立行程代號<mark></h2>
        <input id="ecToken" required="required" type="text" name="token" placeholder="可數英中台語廣東語馬來文" />
        <button type="button" class="btn btn-outline-info" onclick="enterToken();">輸入</button>
        <button type="button" class="btn btn-outline-info" onclick="createToken()">建立</button>
    </div>
    <br>
    <div class="start" id="start" style="display:none;">
        
        <h2><mark>2.目前人物成員有:
            <a id="number"> </a><mark>
            <button type="button" class="btn btn-outline-info" onclick="openNameShow()">打開</button>
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                新增入物
            </button>

            <h2 id="nameShow" style="display:none;"></h2>
        </h2>
        
        <div class="collapse" id="collapseExample">
            <h3> 請輸入以建立人物名稱 </h3>
            <input id="createName" type="text" name="token" placeholder="請輸入或建立" />
            <button type="button" class="btn btn-outline-info" onclick="createName()">輸入</button>
        </div>
    <br>
        <h2><mark>3.記帳
        <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#recordItNow"
                aria-expanded="false" aria-controls="recordItNow">
                打開
        </button></mark></h2>



        <div id="recordItNow" class="collapse"  >
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
            <table id="userMoneyPeople2" class="table table-bordered">

                <tbody>

                </tbody>
            </table>
            <h4></h4>
            </h1>
        </div>
        <input type="button" class="btn btn-outline-info" value="提交" onclick="getAll()"><br />
        </div>
        <br>
        <h2><mark>4.顯示明細
        <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#showbill"
                aria-expanded="false" aria-controls="showbill">
                打開
        </button></mark></h2>


    <div id="showbill" class="collapse" >
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

</div>
    </div>
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
        } else {
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

        function openNameShow() {
            $('#nameShow').toggle();
        }

        function getAll() {
            let payMainMoneyPeople = $('input:radio[name="box"]:checked').map(function () {
                return $(this).val();
            }).get().join(",");
            let userMoneyPeople = $('input:checkbox[name="boxs"]:checked').map(function () {
                return $(this).val();
            }).get().join(",");
            let howmuchmoney = $('#howmuchmoney').val();

            if (payMainMoneyPeople == undefined || userMoneyPeople == undefined || howmuchmoney == undefined ||
                howmuchmoney == 0) {
                alert("輸入內容不允許為空")
            } else {
                if (payMainMoneyPeople == '' || userMoneyPeople == '' || howmuchmoney == '') {
                    alert("輸入內容不允許為空")
                } else {
                    dataToDB(payMainMoneyPeople, userMoneyPeople, howmuchmoney);
                }
            }
            show($('#ecToken').val());
            $('#howmuchmoney').val('');
        }

        function enterToken() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'enterToken',
                        ecToken: $('#ecToken').val(),
                    },
                })
                .then(function (response) {
                    $('.start').show();
                    show($('#ecToken').val());
                    if ($('#ecToken').val() == null || $('#ecToken').val() == '') {
                        alert('請輸入TOKEN');
                    }
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
                    if (response.data == 'NOOOOOOOOO') {
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


                    item2.push(
                        `    
                        <div class="d1">                        
                        <div class="d2">
                        <div class="d3">
                         `
                    )

                    for (let i = 0, len = response.data.length; i < len; i++) {
                        number++;

                        if (i % 3 == 0) {
                            item2.push(
                                `
                                <label><input type="radio" name="box" value="${response.data[i].mainpeople}" ><span> ${response.data[i].mainpeople} </span></label></br>
                                `
                            );
                        } else {
                            item2.push(
                                `
                                <label><input type="radio" name="box" value="${response.data[i].mainpeople}" ><span> ${response.data[i].mainpeople} </span></label>
                                `
                            );
                        }
                    }

                    item2.push(
                        `   
                            </div>
                            </div>
                            </div>

                        `
                    )

                    $('#payMainMoneyPeople2').html(item2.join(''));

                    item3.push(
                        `    
                            <div class="d1">
                            <div class="d2">
                            <div class="d3">
                        `
                    )


                    for (let i = 0, len = response.data.length; i < len; i++) {
                        number++;
                        if (i % 3 == 0) {
                            item3.push(
                                `
                             <label><input type="checkbox" name="boxs" value="${response.data[i].mainpeople}" ><span> ${response.data[i].mainpeople} </span></label><br>
                            `
                            );
                        } else(
                            item3.push(
                                `
                              <label><input type="checkbox" name="boxs" value="${response.data[i].mainpeople}" ><span> ${response.data[i].mainpeople} </span></label>
                            `
                            )
                        );
                    }

                    item2.push(
                        `      
                            </div>
                            </div>
                            </div>
                        `
                    )
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

            abc = families;
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
            let people = wtf.length - 1;

            for (let i = 0; i <= people; i++) //print 人數 
            {
                if (wtf[people].money > wtf[i].money) {
                    let x, y, z;
                    x = wtf[i].money;
                    y = wtf[people].money;
                    z = x + y;
                    wtf[i].money = wtf[people].money + wtf[i].money;

                    if (z > 0) {
                        if (x * -1 != 0) {
                            $('#paypaypay').append(`${wtf[people].name} ==>${wtf[i].name}`);
                        }

                    } else {
                        if (y != 0) {
                            $('#paypaypay').append(`${wtf[people].name} ==>${wtf[i].name}`);
                        }
                    }

                    if (wtf[i].money != 0) {
                        i = i - 1;
                    }

                    if (z > 0) {
                        wtf[people].money = z;
                        if (x * -1 != 0) {
                            $('#paypaypay').append(`<p style="color:red" >${x*-1} 元<br></p>`);
                        }
                        z = 0;
                    } else {
                        people = people - 1;
                        if (y != 0) {
                            $('#paypaypay').append(`<p style="color:red" >${y} 元<br></p>`);
                        }
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




    <style>
        input[type=radio] {
            zoom: 150%;
        }


        input[type=checkbox] {
            zoom: 150%;
        }
    </style>


    <style>
        body {
            display: block;
            margin: 0;
        }

        div {
            display: block;
        }

        label {
            cursor: default;
        }

        input {
            display: inline-block;
            color: inherit;
            font: inherit;
            text-rendering: auto;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            text-indent: 0px;
            text-shadow: none;
            text-align: start;
            -webkit-rtl-ordering: logical;
            -webkit-writing-mode: horizontal-tb;
        }

        input[type="checkbox"],
        input[type="radio"] {
            -webkit-appearance: none;
            margin: 0;
            box-sizing: inherit;
            border: none;
            background-color: inherit;
            padding: 0;
            cursor: pointer;
        }

        body {
            font-family: "Hiragino kaku Gothic Pro", "Meiryo", sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        .d1 {
            margin: 20px;
            border: 1px dashed black;
            padding: 20px 0 0 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .d2 {
            margin: 0px 20px 20px 0px;
            box-sizing: border-box;
            max-width: calc(50em + (20px + 1px) * 2);
            border: 1px solid salmon;
            background-color: rgba(250, 128, 114, 0.2);
            padding: 20px 0 0 20px;
            color: salmon;
        }

        .d3 {
            margin: 0 calc(20px - 5px) calc(20px - 5px) 0;
        }

        .d3 input[type="radio"]+span,
        .d3 input[type="checkbox"]+span {
            display: inline-block;
            margin: 0px 5px 5px 0px;
            cursor: pointer;
            border: solid 1px salmon;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
        }

        .d3 input[type="radio"]:checked+span,
        .d3 input[type="checkbox"]:checked+span {
            background-color: rgba(250, 128, 114, 0.7);
            color: rgba(255, 255, 255, 0.9);
        }

        .d3 input[type="radio"]:hover+span,
        .d3 input[type="checkbox"]:hover+span {
            border-color: rgba(250, 128, 114, 0.5);
            color: rgba(250, 128, 114, 0.5);
        }

        .d3 input[type="radio"]:focus+span,
        .d3 input[type="checkbox"]:focus+span {
            outline: solid 2px rgba(250, 128, 114, 0.5);
            outline-offset: 1px;
        }
    </style>





</body>
 