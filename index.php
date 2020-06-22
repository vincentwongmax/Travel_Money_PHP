<head>
    <meta charset="UTF-8">
    <title>旅行用記帳器</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="manifest" href="./manifest.webmanifest"> -->



    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="WIN神App">
    <link rel="apple-touch-startup-image" href="./abc.png">
    <link rel="apple-touch-icon" href="./abc.png">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="icon" href="./abc.png">
    <meta name="mobile-web-app-capable" content="yes">


</head>

<body>

    <div class="modal fade" id="eachpeople" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="eachpeople-modal-body" class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <H1>旅行用記帳平分器 測試版V.0.055</H1>

    <div id="payMainMoneyPeople">
        <h2 id="tokenIsWhat"><mark>1. 請輸入或建立行程代號 <mark></h2>
        <input id="ecToken" required="required" type="text" name="token" placeholder="可數英中台語廣東語馬來文" ></input>
        <button type="button" class="btn btn-outline-info" onclick="enterToken();">輸入</button>
        <button type="button" class="btn btn-outline-info" onclick="createToken()">建立</button>
    </div>
    <br>
    <div class="start" id="start" style="display:none;">
        <h2><mark>2.人物成員有:
                <a id="number"> </a><mark>
                    <button type="button" class="btn btn-outline-success" onclick="openNameShow()">打開</button>
                    <button class="btn btn-outline-success" type="button" data-toggle="collapse"
                        data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        新增入物
                    </button>

                    <h2 id="nameShow" style="display:none;"></h2>
        </h2>

        <div class="collapse" id="collapseExample">
            <h3> 請輸入以建立人物名稱 </h3>
            <input id="createName" onkeyup="this.value=this.value.replace(/,/g,'')" type="text"
                name="token" placeholder="請輸入或建立" />
            <button type="button" class="btn btn-outline-info" onclick="createName()">輸入</button>
        </div>

        <br>
        <h2><mark>3.記帳
                <button class="btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#recordItNow"
                    aria-expanded="false" aria-controls="recordItNow">
                    打開
                </button></mark></h2>

        <div id="recordItNow" class="collapse">
            <div id="payMainMoneyPeople">
                <h1>付錢人(單選)</h1>
                <h3 id="payMainMoneyPeople2"></h3>
                </h1>
            </div>

            <br><br>
            <h2>請輸入付款多少錢</h2>
            <!-- onkeydown="return my_key(event)" -->
            <input id="howmuchmoney" onchange="return my_key(event)" 
         required="required" type="number" placeholder="請輸入付款多少錢"> </input>
            <br>
            <h2>請輸入備注</h2>
            <input id="payMoneyNotes" type="text" placeholder="請輸入備注"> </input>
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
                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#showbill"
                    aria-expanded="false" aria-controls="showbill">
                    打開
                </button></mark></h2>


        <div id="showbill" class="collapse">
            <table id="showWaterBill" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">付款人</th>
                        <th scope="col">受益人</th>
                        <th scope="col">錢</th>
                        <th scope="col">備注</th>
                        <th scope="col">上傳時間</th>
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
<br>
        <h2><mark>5.其他功能
                <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#delll"
                    aria-expanded="false" aria-controls="delll">
                    打開
                </button></mark></h2>

        <div id= "delll" class="collapse">
            <h3> 顯示已刪除的資料
            <table id="delllBill" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">付款人</th>
                        <th scope="col">受益人</th>
                        <th scope="col">錢</th>
                        <th scope="col">備注</th>
                        <th scope="col">上傳時間</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    </br>

    <script>
        let getUrlString = location.href;
        let url = new URL(getUrlString);
        let get = url.searchParams.get('token');

        if (get != null || get != '') {
            document.getElementById('ecToken').value = get;
        }

        var userMoneyPeople;
        var payMainMoneyPeople;
        var createNamee;

        function openNameShow() {
            $('#nameShow').toggle();
        }

        function my_key(e){
            if(isNaN($('#howmuchmoney').val()) == true)
            {   
                alert('請輸入數字');
                $('#howmuchmoney').val('');
            }
        }

        function getAll() {
            let payMainMoneyPeople = $('input:radio[name="box"]:checked').map(function () {
                return $(this).val();
            }).get().join(",");
            let userMoneyPeople = $('input:checkbox[name="boxs"]:checked').map(function () {
                return $(this).val();
            }).get().join(",");
            let howmuchmoney = $('#howmuchmoney').val();
            let payMoneyNotes = $('#payMoneyNotes').val();

            if(isNaN($('#howmuchmoney').val()) == true){
                alert('請輸入數字');
                return;
            }

            if (payMainMoneyPeople == undefined || userMoneyPeople == undefined || howmuchmoney == undefined ||
                howmuchmoney == 0) {
                alert("輸入內容不允許為空")
            } else {
                if (payMainMoneyPeople == '' || userMoneyPeople == '' || howmuchmoney == '') {
                    alert("輸入內容不允許為空")
                } else {
                    dataToDB(payMainMoneyPeople, userMoneyPeople, howmuchmoney, payMoneyNotes);
                }
            }
            show($('#ecToken').val());
            $('#howmuchmoney').val('');
            $('#payMoneyNotes').val('')

        }

        function enterToken() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'enterToken',
                        ecToken: $('#ecToken').val(),
                    },
                })
                .then(function (response) {
                    if (families != undefined || families != '') {
                        families = [];
                    }

                    show($('#ecToken').val());
                    
                    if ($('#ecToken').val() == null || $('#ecToken').val() == '') {
                        alert('請輸入TOKEN');
                        return;
                    }
                    if (response.data[0] == undefined) {
                        $('.start').hide();
                        document.getElementById("tokenIsWhat").innerHTML = `<mark>1. 請輸入或建立行程代號</mark>`;

                        if (confirm('沒有DATA, 建立新的TOEKN?')) {
                            createToken()
                        }
                    } else {
                        $('.start').show();
                        createNamee = $('#ecToken').val();
                        document.getElementById("tokenIsWhat").innerHTML =
                            `<mark>1. 已輸入代號: <a style="color:red ">${createNamee}</a></mark>`;
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
                    showdeldata();
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

                    $('#number').html('');
                    $('#nameShow').html('');
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

                        item2.push(
                            `
                        <label><input type="radio" name="box" value="${response.data[i].mainpeople}" ><span> ${response.data[i].mainpeople} </span></label>
                        `
                        );
                    }

                    item2.push(
                        `   
                            </div>
                            </div>
                            </div>

                        `
                    )
                    $('#payMainMoneyPeople2').html('');
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
                        item3.push(
                            `
                              <label><input type="checkbox" name="boxs" value="${response.data[i].mainpeople}" ><span> ${response.data[i].mainpeople} </span></label>
                            `
                        )
                    }

                    item2.push(
                        `      
                            </div>
                            </div>
                            </div>
                        `
                    )
                    $('#userMoneyPeople2').html('');
                    $('#userMoneyPeople2').html(item3.join(''));
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function createName() {
            let indexf = $('#createName').val();
            var idx = indexf.indexOf(",") ;
            var idxs = $('#createName').val().indexOf("，") ;
            if(idx == -1 && idxs == -1 && $('#createName').val() != null && $('#createName').val() != ''){
                axios.post('testdb2.php', {
                    data: {
                        action: 'createName',
                        mainpeople: $('#createName').val(),
                        token: createNamee,
                    },
                })
                .then(function (response) {
                    console.log(response.data);
                    if(response.data == 'OKK'){
                        alert('DONE');
                    }else{
                        alert('重覆');
                    }
                    createName2 = $('#createName').val();
                    $('#nameShow').append(`<tr><td>${createName2}</td></tr>`);
                    show($('#ecToken').val());
                    $('#createName').val('');
                })
                .catch(function (error) {
                    console.log(error);
                });
            }else{
                alert('請勿輸入禁止字元')
            }
        }

        function dataToDB(payMainMoneyPeople, userMoneyPeople, howmuchmoney, payMoneyNotes) {
            axios.post('testdb2.php', {
                    data: {
                        action: 'dataToDB',
                        payMainMoneyPeople: payMainMoneyPeople,
                        userMoneyPeople: userMoneyPeople,
                        howmuchmoney: howmuchmoney,
                        payMoneyNotes: payMoneyNotes,
                        token: createNamee,
                    },
                })
                .then(function (response) {
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
                                    <th scope="row">${response.data.length - i}</th>
                                    <td>${response.data[i].paymoneypeople}</td>
                                    <td>${response.data[i].usemoneypeople}</td>
                                    <td>${response.data[i].howmuchmoney}</td>
                                    <td>${response.data[i].notes}</td>
                                    <td onclick ="deldata('${response.data[i].IDED}');" >${response.data[i].adddatatime}</td>
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
        
        function showdeldata() {
            axios.post('testdb2.php', {
                    data: {
                        action: 'showdeldata',
                        ecToken: $('#ecToken').val(),
                    },
                })
                .then(function (response) {
                    item = [];
                    for (let i = 0, len = response.data.length; i < len; i++) {
                        item.push(
                            `
                                <tr>
                                    <th scope="row">${response.data.length - i}</th>
                                    <td>${response.data[i].paymoneypeople}</td>
                                    <td>${response.data[i].usemoneypeople}</td>
                                    <td>${response.data[i].howmuchmoney}</td>
                                    <td>${response.data[i].notes}</td>
                                    <td>${response.data[i].adddatatime}</td>
                                </tr>
                            `
                        );
                    }
                    $('#delllBill > tbody').html(item.join(''));
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
                    // families[i].money = families[i].money;

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

            $('#showPersonMoney').empty();
            $('#showPersonMoney').append(`<h3 style="color:cadetblue"> 目前每個人的錢 </h3>`)
            families.forEach(element => {
                $('#showPersonMoney').append(
                    `<a onclick="eachpeoplefunction('${element.name}');" >${element.name} =>  ${element.money} </a><br>`
                    )
            });

            families.forEach(element => {
                element.money = element.money * -1;
            });

            sortByKey(families, 'money'); //json, 排序用的key
            $('#paypaypay').empty();
            $('#paypaypay').append(`<h3 style="color:brown" > 請跟據指示進行付款 </h3>`);
            wtfwhocare(families);
        }

        function deldata(id) {

            if (confirm('進行刪除，刪除後無法復原')) {
                axios.post('testdb2.php', {
                        data: {
                            action: 'deldata',
                            id: id,
                        },
                    })
                    .then(function (response) {
                      console.log('已刪除成功');
                      show($('#ecToken').val());
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }

        function eachpeoplefunction(people) {
            $('#eachpeople').modal('show');
            document.getElementById('eachpeople-modal-body').innerHTML = `${people}`
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
                            $('#paypaypay').append(`${wtf[people].name} ==>${wtf[i].name} <button type="button"  class="btn btn-secondary btn-sm" onclick="autoPay('${wtf[people].name},${wtf[i].name},${x*-1}')">結算</button>`);
                        }

                    } else {
                        if (y != 0) {
                            $('#paypaypay').append(`${wtf[people].name} ==>${wtf[i].name} <button type="button"  class="btn btn-secondary btn-sm" onclick="autoPay('${wtf[people].name}','${wtf[i].name}','${y}')">結算</button>`);
                        }
                    }

                    if (wtf[i].money != 0) {
                        i = i - 1;
                    }

                    if (z > 0) {
                        wtf[people].money = z;
                        if (x * -1 != 0) {
                            $('#paypaypay').append(`<p style="color:red" >${x*-1} 元 <br></p>`);
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

        function autoPay(a,b,c){
            let d = '還錢(系統)';
            if(confirm(`${a} => ${b}  ${c}元`))
            {
                dataToDB(a, b, c, d);
                show($('#ecToken').val());
                alert('已完成結帳');
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
 