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
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
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

    <H1>旅行用記帳平分器 測試版V.0.07</H1>
    <div id="payMainMoneyPeople">
        <h2 id="tokenIsWhat"><mark>1. 請輸入或建立行程代號 <mark></h2>
        <input id="ecToken" required="required" type="text" name="token" placeholder="可數英中台語廣東語馬來文"></input>
        <button type="button" class="btn btn-outline-info" onclick="enterToken();">輸入</button>
        <button type="button" class="btn btn-outline-info" onclick="createToken()">建立</button>
        <button type="button" class="btn btn-outline-secondary" onclick="generateRandomToken()">隨機產生</button>
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
            <input id="createName" onkeyup="this.value=this.value.replace(/,/g,'')" type="text" name="token"
                placeholder="請輸入或建立" />
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
            <input id="howmuchmoney" onchange="return my_key(event)" required="required" type="number"
                placeholder="請輸入付款多少錢"> </input>
            <br>
            <h2>請輸入備注</h2>
            <input id="payMoneyNotes" type="text" placeholder="請輸入備注"> </input>
            <br><br>
            <div id="userMoneyPeople">
                <h1 style="display: flex; align-items: center;">
                    受益人(可多選)
                    <button type="button" class="btn btn-sm btn-outline-primary ml-3" onclick="toggleSelectAllBeneficiaries(this)">
                        全選
                    </button>
                </h1>

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
        </div>
        <br>
        <h2><mark>5.個人明細
                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#personal"
                    aria-expanded="false" aria-controls="personal">
                    打開
                </button></mark></h2>
        <div id="personal" class="collapse">
            <table id="showPersonMoney" class=" table-Light">
                <thead>
                    <tr>
                        <th scope="col">名字</th>
                        <th scope="col">&emsp;</th>
                        <th scope="col">餘額</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <h3 style="font-weight:bold;">目前每個人的錢</h3>
                </tbody>
            </table>
        </div>
        <br>
        <h2><mark>6.結帳指示
                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#wheremoneygo"
                    aria-expanded="false" aria-controls="wheremoneygo">
                    打開
                </button></mark></h2>

        <div id="wheremoneygo" class="collapse">
            
        <br><br><br>
            <h4 id="paypaypay"></h4>
        </div>
        <br>
        <h2><mark>7.其他功能
                <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#delll"
                    aria-expanded="false" aria-controls="delll">
                    打開
                </button></mark></h2>

        <div id="delll" class="collapse">
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

        function my_key(e) {
            if (isNaN($('#howmuchmoney').val()) == true) {
                alert('請輸入數字');
                $('#howmuchmoney').val('');
            }
        }

        function generateRandomToken() {
            const words = [
                "travel", "trip", "journey", "adventure", "explore", "holiday", "vacation", "tour", "roam", "wander",
                "flight", "ticket", "passport", "visa", "luggage", "suitcase", "backpack", "bag", "pack", "carry",
                "hotel", "hostel", "inn", "resort", "guesthouse", "camp", "tent", "cabin", "villa",
                "beach", "island", "mountain", "forest", "desert", "lake", "river", "sea", "ocean", "bay",
                "city", "town", "village", "country", "nation", "region", "place", "spot", "site", "area",
                "guide", "map", "plan", "route", "path", "trail", "track", "road", "highway", "station",
                "bus", "train", "plane", "flight", "car", "taxi", "bike", "boat", "ship", "ferry",
                "adventure", "explore", "discover", "enjoy", "relax", "fun", "happy", "smile", "group", "friend",
                "photo", "camera", "memory", "story", "moment", "experience", "culture", "local", "food", "drink",
                "ticket", "booking", "reservation", "checkin", "checkout", "arrival", "departure", "schedule", "itinerary", "plan",
                "sun", "sky", "cloud", "rain", "wind", "snow", "star", "moon", "nature", "wild"
            ];
            let randomWord = words[Math.floor(Math.random() * words.length)];
            let now = new Date();
            let yyyy = now.getFullYear();
            let mm = String(now.getMonth() + 1).padStart(2, '0');
            let dd = String(now.getDate()).padStart(2, '0');
            let dateStr = yyyy + mm + dd;
            let token = randomWord + dateStr;
            document.getElementById('ecToken').value = token;
        }

        function toggleSelectAllBeneficiaries(btn) {
            // 取得所有受益人checkbox
            var checkboxes = document.querySelectorAll('#userMoneyPeople2 input[type="checkbox"][name="boxs"]');
            // 判斷是否已全選
            var allChecked = Array.from(checkboxes).every(cb => cb.checked);
            checkboxes.forEach(cb => cb.checked = !allChecked);
            // 按鈕文字切換
            btn.textContent = allChecked ? '全選' : '全不選';
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

            if (isNaN($('#howmuchmoney').val()) == true) {
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
                            `<mark>1. 已輸入代號: <a style="color:red ">${createNamee}  </a><button type="button" class="btn btn-outline-primary" onclick="shareLink()">分享</button></mark>`;
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
            var idx = indexf.indexOf(",");
            var idxs = $('#createName').val().indexOf("，");
            if (idx == -1 && idxs == -1 && $('#createName').val() != null && $('#createName').val() != '') {
                axios.post('testdb2.php', {
                        data: {
                            action: 'createName',
                            mainpeople: $('#createName').val(),
                            token: createNamee,
                        },
                    })
                    .then(function (response) {
                        if (response.data == 'OKK') {
                            alert('DONE');
                        } else {
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
            } else {
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
                    if (response.request.responseText == '["NOOOOOOO"]') {
                        alert('有錯哦，請注意備注是否有重覆');
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
            var itemtable = [];
            for (let i = 0, len = families.length; i < len; i++) {
                let aabb = families[i].name;
                let ele2 = families[i].money.toFixed(2);
                itemtable.push(
                    `
                                <tr>
                                    <th onclick="eachpeoplefunction('${aabb}');" scope="row"><button type="button" class="btn btn-outline-info">${aabb}</button></th>
                                    <td> &emsp;   ||   &emsp; &emsp; </td>
                                    <td style="color:red;">${ele2}</td>
                                </tr>
                            `
                );
            }
            $('#showPersonMoney > tbody').html(itemtable.join(''));

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
                        show($('#ecToken').val());
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }



        
        // function shareLink() {
        //     var dummy = document.createElement('input'),
        //         text = window.location.href;
        //     document.body.appendChild(dummy);
        //     dummy.value = text;
        //     dummy.select();
        //     document.execCommand('copy');
        //     document.body.removeChild(dummy);
        //     alert("已複製這次專案網址，可用於分享");
        // }

        function shareLink() {
            var dummy = document.createElement('input'),

                link = window.location.href

                if (link.indexOf('?') !== -1) {
                    link = link.substring(0, link.indexOf('?'));
                }

                text = link + `?token=${$('#ecToken').val()}`;
                
               // text = `http:/travelmoney.ga` + `?token=${$('#ecToken').val()}`;
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);
            alert("已複製這次專案網址，可用於分享");
        }

        // 新增：控制是否顯示時間
        let showEachPeopleTime = true;

        function toggleEachPeopleTime() {
            showEachPeopleTime = !showEachPeopleTime;
            // 重新載入上次查詢的人名
            if (window.lastEachPeopleName) {
            eachpeoplefunction(window.lastEachPeopleName);
            }
        }

        function eachpeoplefunction(people) {
            window.lastEachPeopleName = people; // 記錄上次查詢的人名
            axios.post('testdb2.php', {
            data: {
            ecToken: $('#ecToken').val(),
            action: 'eachpeople',
            eachpeople: people,
            },
            })
            .then(function (response) {
            let item = [];

            // 標題
            item.push(`
            <tr>
            <th colspan="3" style="text-align:center; background:linear-gradient(90deg, #f8d7da 0%, #ffe5ec 100%); color:#b71c1c; padding:22px 10px 18px 10px; border-radius:16px 16px 0 0; box-shadow:0 2px 8px #f8bbd0;">
            <span style="font-size:1.7em; font-weight:bold; letter-spacing:2px;">
            <i class="fas fa-user-circle" style="margin-right:10px; color:#b71c1c;"></i>
            個人帳單 <span style="color:#880e4f;">(${people})</span>
            </span>
            </th>
            </tr>
            `);

            // 切換顯示時間按鈕
            item.push(`
            <tr>
                <td colspan="3" style="text-align:right; background:#fff;">
                    <div style="display:flex; justify-content:flex-end; gap:8px;">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleEachPeopleTime()">
                            ${showEachPeopleTime ? '隱藏時間' : '顯示時間'}
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-info" style="margin-left:8px;" onclick="window.showDetailOwed = !window.showDetailOwed; eachpeoplefunction('${people}');">
                            ${window.showDetailOwed ? '隱藏詳細' : '顯示詳細'}
                        </button>
                    </div>
                </td>
            </tr>
            `);

            // 已付錢項目
            item.push(`
            <tr>
            <th colspan="3" style="background:linear-gradient(90deg,#e8f5e9 0%,#f1f8e9 100%);color:#388e3c;font-size:1.1em;padding:10px 0;">
            <i class="fas fa-wallet" style="margin-right:6px;color:#616161;"></i>代付錢項目
            </th>
            </tr>
            `);

            let totalPaid = 0;
            if (response.data[0].length > 0) {
                for (let i = 0; i < response.data[0].length; i++) {
                let money = Number(response.data[0][i].howmuchmoney).toFixed(3);
                totalPaid += Number(response.data[0][i].howmuchmoney);
                item.push(`
                <tr style="background:#f9fbe7;">
                <td style="vertical-align:middle;"><span style="font-weight:bold;color:#616161;">${response.data[0][i].notes}</span></td>
                <td style="color:#d84315;font-weight:bold;vertical-align:middle;text-align:right;">+${money}</td>
                <td style="font-size:0.95em;color:#757575;vertical-align:middle;${showEachPeopleTime ? '' : 'display:none;'}">${response.data[0][i].adddatatime}</td>
                </tr>
                `);
                }
            } else {
                item.push(`
                <tr>
                <td colspan="3" style="color:gray;text-align:center;">沒有代付錢項目</td>
                </tr>
                `);
            }
            item.push(`
            <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;background:#e8f5e9;">
            代付款金額小結: <span style="color:#d84315;font-size:1.1em;text-align:right;display:inline-block;min-width:90px;">+${totalPaid.toFixed(3)}</span>
            </td>
            </tr>
            `);

            // 需要付款項目
            item.push(`
            <tr>
            <th colspan="3" style="background:linear-gradient(90deg,#f5f5f5 0%,#eeeeee 100%);color:#616161;font-size:1.1em;padding:10px 0;">
            <i class="fas fa-hand-holding-usd" style="margin-right:6px;color:#616161;"></i>需要付款項目
            </th>
            </tr>
            `);

            // 詳細版切換
            let showDetailOwed = window.showDetailOwed !== undefined ? window.showDetailOwed : false;
    
            let totalOwed = 0;
            if (response.data[1].length > 0) {
                for (let i = 0; i < response.data[1].length; i++) {
                let a = response.data[1][i].usemoneypeople.split(',');
                let b = a.length;
                let c = (Number(response.data[1][i].howmuchmoney) / b).toFixed(3);
                totalOwed += Number(c);

                // 詳細版內容
                let detailHtml = '';
                if (showDetailOwed) {
                    detailHtml = `<div style="font-size:0.9em;color:#888;">${response.data[1][i].howmuchmoney} ÷ ${b} = ${c}</div>`;
                }

                item.push(`
                <tr style="background:#f5f5f5;">
                <td style="vertical-align:middle;">
                    <span style="font-weight:bold;color:#616161;">${response.data[1][i].notes}</span>
                    ${detailHtml}
                </td>
                <td style="color:#1976d2;font-weight:bold;vertical-align:middle;text-align:right;">-${c}</td>
                <td style="font-size:0.95em;color:#757575;vertical-align:middle;${showEachPeopleTime ? '' : 'display:none;'}">${response.data[1][i].adddatatime}</td>
                </tr>
                `);
                }
            } else {
                item.push(`
                <tr>
                <td colspan="3" style="color:gray;text-align:center;">沒有需要付款項目</td>
                </tr>
                `);
            }
            item.push(`
            <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;background:#f5f5f5;">
            需要付款金額小結: <span style="color:#1976d2;font-size:1.1em;text-align:right;display:inline-block;min-width:90px;">-${totalOwed.toFixed(3)}</span>
            </td>
            </tr>
            `);

            // 總結
            let net = (totalPaid - totalOwed).toFixed(3);
            let netColor = net >= 0 ? "#388e3c" : "#d32f2f";
            let netSign = net >= 0 ? "+" : "";
            item.push(`
            <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;font-size:1.2em;background:linear-gradient(90deg,#e3f2fd 0%,#fce4ec 100%);border-radius:0 0 12px 12px;">
            <span style="color:#616161;">個人結餘：</span>
            <span style="color:${netColor};text-align:right;display:inline-block;min-width:90px;">${netSign}${net}</span>
            </td>
            </tr>
            `);

            $('#eachpeople-modal-body').html(`
            <table class="table table-bordered table-sm mb-0" style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 12px #f8bbd0;">
            <tbody>
            ${item.join('')}
            </tbody>
            </table>
            `);
            })
            .catch(function (error) {
            console.log(error);
            });

            $('#eachpeople').modal('show');
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
                            let output3 = x * -1;
                            let outputok3 = output3.toFixed(2);
                            $('#paypaypay').append(
                                `${wtf[people].name} ==>${wtf[i].name} <button type="button"  class="btn btn-secondary btn-sm" onclick="autoPay('${wtf[people].name}','${wtf[i].name}','${outputok3}')">結算</button>`
                                );
                        }

                    } else {
                        if (y != 0) {
                            let output4 = x * -1;
                            let outputok4 = output4.toFixed(2);

                            $('#paypaypay').append(
                                `${wtf[people].name} ==>${wtf[i].name} <button type="button"  class="btn btn-secondary btn-sm" onclick="autoPay('${wtf[people].name}','${wtf[i].name}','${outputok4}')">結算</button>`
                                );
                        }
                    }

                    if (wtf[i].money != 0) {
                        i = i - 1;
                    }

                    if (z > 0) {
                        wtf[people].money = z;
                        if (x * -1 != 0) {
                            let output1 = x * -1;
                            outputok1 = output1.toFixed(2);
                            $('#paypaypay').append(`<p style="color:red" >${outputok1} 元 <br></p>`);
                        }
                        z = 0;
                    } else {
                        people = people - 1;
                        if (y != 0) {
                            let output2 = y;
                            outputok2 = output2.toFixed(2);
                            $('#paypaypay').append(`<p style="color:red" >${outputok2} 元<br></p>`);
                        }
                    }
                }
            }
        }

        function autoPay(a, b, c) {
            let d = '還錢(系統)';
            let c1 = prompt(`${a}  ->>  ${b}  多少錢`, );
            if (c1 == null || c1 == "") {} else {
                dataToDB(a, b, c1, d);
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
 