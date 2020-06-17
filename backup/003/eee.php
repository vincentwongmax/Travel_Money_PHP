<head>
    <meta charset="UTF-8">
    <title>checkBox</title>
    <!-- <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>

    <div id="payMainMoneyPeople">
        <h2>請輸入或建立</h2>
        <input id="ecToken"type="text" name="token" placeholder="請輸入或建立" />
        <button type="button" class="btn btn-outline-info" onclick="enterToken();">輸入</button>
        <button type="button" class="btn btn-outline-info" onclick="createToken()">建立</button>
    </div>
    <br><br><br><br>

    <h2>請輸入以建立人物名稱</h2>
    <input id="createName" type="text" name="token" placeholder="請輸入或建立" />
    <button type="button" class="btn btn-outline-info" onclick="createName()">輸入</button>
    <br><br><br><br>

    <h1> 目前人物成員有:
       <h2 id="nameShow" ></h2>
    <h1>

            <br><br>

            <div id="payMainMoneyPeople">
                <h1>付錢人(單選)</h1>
                黃： <input type="checkbox" name="box" value="黃" /><br>
                文： <input type="checkbox" name="box" value="文" /><br>
                建： <input type="checkbox" name="box" value="建" /><br>
                件： <input type="checkbox" name="box" value="件" /><br>
                WIN神： <input type="checkbox" name="box" value="WIN神" /><br><br />
            </div>

            <h2>請輸入付款多少錢</h2>


            <div id="userMoneyPeople">
                <h1>付錢人(可多選)</h1>
                黃： <input type="checkbox" name="boxs" value="黃" /><br>
                文： <input type="checkbox" name="boxs" value="文" /><br>
                建： <input type="checkbox" name="boxs" value="建" /><br>
                件： <input type="checkbox" name="boxs" value="件" /><br>
                WIN神： <input type="checkbox" name="boxs" value="WIN神" /><br /><br>
            </div>

            <input type="button" value="提交" onclick="getAll()"><br />

            <script>
                var userMoneyPeople;
                var payMainMoneyPeople;
                var createNamee;
                
                function getAll() {
                    payMainMoneyPeople();
                    userMoneyPeople()
                }

                function payMainMoneyPeople() {
                    var payMainMoneyPeople = $('input:checkbox[name="box"]:checked').map(function () {
                        return $(this).val();
                    }).get().join(",");
                    console.log(payMainMoneyPeople);
                }

                function userMoneyPeople() {
                    var userMoneyPeople = $('input:checkbox[name="boxs"]:checked').map(function () {
                        return $(this).val();
                    }).get().join(",");
                    console.log(userMoneyPeople);

                    var selected = document.querySelectorAll('input[type=checkbox][name="boxs"]:checked');
                    var userMoneyPeople = Array.from(selected).map(function (item) {
                        return item.value;
                    });
                    console.log(userMoneyPeople);
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
                            if(response.data[0]== undefined ){
                                if(confirm('沒有DATA, 建立新的TOEKN?')){
                                    createToken()
                                }
                            }else{
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
                            if(response.responseText = 'NO'){
                                console.log(response);
                                alert('重覆');
                                return;
                            }
                            // console.log('2');
                            // console.log(response.data);
                            createNamee = $('#ecToken').val();
                            alert('建立成功');
                            show($('#ecToken').val());
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                let show =(token) =>{
                    axios.post('testdb2.php', {
                        data: {
                            action: 'member',
                            ecToken: token,
                             },
                        })
                        .then(function (response) {
                           // console.log(response.data);
                    item=[];
                    for (let i = 0, len = response.data.length; i < len; i++) {
                        item.push(
                            `
                            <tr 
                                <td>${response.data[i].ID}</td>
                                <td>${response.data[i].mainpeople}</td>
                            </tr
                            `
                        );
                    }
                    $('#nameShow').html(item.join(''));
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                
                let createName = () =>{
                    axios.post('testdb2.php', {
                        data: {
                            action: 'createName',
                            mainpeople: $('#createName').val(),
                            token: createNamee,
                            },
                        })
                        .then(function (response) {
                           // console.log(response.data);
                           createName = $('#createName').val();
                             $('#nameShow').append( `<tr><td>${createName}</td></tr>`);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

            </script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>
</body>
 