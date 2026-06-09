<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        header("Location: error.php");
        exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '用戶';

?>

<head>
    <meta charset="UTF-8">
    <title>旅行用記帳器</title>
    <h3 class="card-title">歡迎回來，<?php echo htmlspecialchars($username); ?></h3>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <style>
        /* RWD: 在多筆分配介面每一行增加分隔線 */
        #splitRows .split-label { display: none; }
        @media (max-width: 768px) {
            #splitRows .split-row {
                border-bottom: 1px solid #e0e0e0;
                padding-bottom: 8px;
                margin-bottom: 8px;
            }
            #splitRows .split-row:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
            }
            /* 在窄螢幕顯示每一行的欄位標題 */
            #splitRows .split-label {
                display: block;
                font-weight: 600;
                margin-bottom: 4px;
            }
        }
        </style>
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
                <div class="record-title">付錢人(單選)</div>
                <div id="payMainMoneyPeople2" class="record-options"></div>
            </div>
            <h2>請輸入付款多少錢</h2>
            <input id="howmuchmoney" onchange="return my_key(event)" required="required" type="number"
                placeholder="請輸入付款多少錢"> </input>
            <br>
            <h2>請輸入備注</h2>
            <input id="payMoneyNotes" type="text" placeholder="請輸入備注"> </input>
            <br><br>
            <div id="userMoneyPeople">
                <div class="record-title d-flex align-items-center">
                    <span>受益人(可多選)</span>
                    <button type="button" class="btn btn-sm btn-outline-primary ml-3" onclick="toggleSelectAllBeneficiaries(this)">
                        全選
                    </button>
                </div>

                <table id="userMoneyPeople2" class="table table-bordered">
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <input type="button" class="btn btn-outline-info" value="提交" onclick="getAll()"><br />
            </div>
        </div>
        <br>
        <h2><mark>4.記帳PLUS
                <button class="btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#advancedSplitPanel"
                    aria-expanded="false" aria-controls="advancedSplitPanel">
                    打開
                </button></mark></h2>

        <div id="advancedSplitPanel" class="collapse card p-3 mt-3" style="background:#f8f9fa;">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div><strong>多筆分配介面</strong>：可針對同一總金額，按行新增付款人 / 使用人 / 金額 / 內容。</div>
            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <label>總金額</label>
                    <input id="splitTotalAmount" type="number" min="0" class="form-control" placeholder="輸入總金額" onchange="updateSplitSummary()" />
                </div>
                <div class="form-group col-md-8">
                    <label>總帳單內容</label>
                    <input id="splitTotalNote" type="text" class="form-control" placeholder="輸入總帳單備註，例如：QWERT" />
                </div>
            </div>
            <div id="splitRows"></div>
            <div class="mt-2">
                <div id="splitSummary" style="font-weight:bold;">已分配: 0 / 總金額: 0，誤差: 0</div>
                <small class="text-muted">請使用上方「總金額」輸入欄位作為分配依據。</small>
            </div>
            <div class="mt-2 d-flex align-items-center">
                <button type="button" class="btn btn-sm btn-outline-primary mr-2" onclick="addSplitRow()">新增筆數</button>
                <button type="button" class="btn btn-outline-success" onclick="submitSplitRows()">提交</button>
            </div>
        </div>

        <br>
        <h2><mark>5.顯示明細
                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#showbill"
                    aria-expanded="false" aria-controls="showbill">
                    打開
                </button>
                <button class="btn btn-outline-secondary ml-2" type="button" onclick="refreshDatabase()">刷新數據庫</button>
            </mark></h2>

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
        <h2><mark>6.個人明細
                <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#personal"
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
        <h2><mark>7.結帳指示
                <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#wheremoneygo"
                    aria-expanded="false" aria-controls="wheremoneygo">
                    打開
                </button></mark></h2>

        <div id="wheremoneygo" class="collapse">
            
        
            <h4 id="paypaypay"></h4>
        </div>
        <br>
        <h2><mark>8.其他功能
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

        function submitEntry(payMainMoneyPeople, userMoneyPeople, howmuchmoney, payMoneyNotes) {
            return axios.post('testdb2.php', {
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
                        throw new Error('有錯哦，請注意備注是否有重覆');
                    }
                    return response;
                })
                .catch(function (error) {
                    console.log(error);
                    throw error;
                });
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

            if (!payMainMoneyPeople || !userMoneyPeople || !howmuchmoney || howmuchmoney == 0) {
                alert("輸入內容不允許為空");
                return;
            }

            submitEntry(payMainMoneyPeople, userMoneyPeople, howmuchmoney, payMoneyNotes)
                .then(function () {
                    alert('DONE');
                    show($('#ecToken').val());
                    $('#howmuchmoney').val('');
                    $('#payMoneyNotes').val('');
                })
                .catch(function (error) {
                    if (error && error.message) {
                        alert(error.message);
                    }
                });
        }

        function toggleAdvancedSplit() {
            const panel = document.getElementById('advancedSplitPanel');
            const wasHidden = panel.style.display !== 'block';
            panel.style.display = wasHidden ? 'block' : 'none';
            if (wasHidden) {
                const topTotal = Number($('#howmuchmoney').val());
                if (topTotal > 0 && !$('#splitTotalAmount').val()) {
                    $('#splitTotalAmount').val(topTotal);
                }
                if (document.querySelectorAll('.split-row').length === 0) {
                    addSplitRow();
                }
                updateSplitSummary();
            }
        }

        function buildPayerHtml(selectedValue) {
            return `
                <select class="form-control split-payer-select" onchange="updateSplitSummary()">
                    ${currentMembers.map(member => `<option value="${member}"${member === selectedValue ? ' selected' : ''}>${member}</option>`).join('')}
                </select>
            `;
        }

        function refreshSplitOptions() {
            const checkboxHtml = currentMembers.map(member => `<label><input type="checkbox" class="split-user" value="${member}"><span> ${member} </span></label>`).join('');
            document.querySelectorAll('.split-users').forEach(container => {
                container.innerHTML = checkboxHtml;
            });
            document.querySelectorAll('.split-payer').forEach(container => {
                const selected = container.querySelector('.split-payer-select') ? container.querySelector('.split-payer-select').value : null;
                container.innerHTML = buildPayerHtml(selected);
            });
        }

        function addSplitRow() {
            if (currentMembers.length === 0) {
                alert('請先輸入 TOKEN 並載入付款人名單');
                return;
            }
            const lastRow = document.querySelector('#splitRows .split-row:last-child');
            const lastPayer = lastRow ? lastRow.querySelector('.split-payer-select')?.value : '';
            const selectedPayer = lastPayer && currentMembers.includes(lastPayer) ? lastPayer : (currentMembers[0] || '');
            const row = document.createElement('div');
            // 建立 split row（移除 mb-3 與 p-2，避免外部多餘間距）
            row.className = 'split-row';
            row.innerHTML = `
                <div class="form-row no-gutters align-items-start">
                    <div class="form-group col-auto split-index pr-1">
                        <span class="index-num"></span>
                    </div>
                    <div class="form-group col-auto pr-1">
                        <label class="split-label">付款人</label>
                        <div class="split-payer d3">
                            ${buildPayerHtml(selectedPayer)}
                        </div>
                    </div>
                    <div class="form-group col-auto pr-1">
                        <label class="split-label">使用人</label>
                        <div class="split-users d3">
                            ${currentMembers.map(member => `<label><input type="checkbox" class="split-user" value="${member}"><span> ${member} </span></label>`).join('')}
                        </div>
                    </div>
                    <div class="form-group col px-1">
                        <label class="split-label">金額</label>
                        <input type="number" class="form-control split-amount" min="0" placeholder="0" onchange="updateSplitSummary()" onkeydown="splitAmountTabHandler(event)" />
                    </div>
                    <div class="form-group col px-1 split-content">
                        <label class="split-label">內容</label>
                        <div class="split-content-controls">
                            <input type="text" class="form-control split-note" placeholder="內容" />
                            <button type="button" class="btn btn-danger btn-sm split-delete-btn" onclick="removeSplitRow(this)">刪除</button>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('splitRows').appendChild(row);
            renumberSplitRows();
            updateSplitSummary();
        }

        function removeSplitRow(button) {
            const row = button.closest('.split-row');
            if (row) {
                row.remove();
            }
            renumberSplitRows();
            updateSplitSummary();
        }

        function renumberSplitRows() {
            const rows = Array.from(document.querySelectorAll('#splitRows .split-row'));
            rows.forEach((r, idx) => {
                const idxEl = r.querySelector('.index-num');
                if (idxEl) idxEl.textContent = (idx + 1) + '.';
            });
        }

        function getSplitTotalAmount() {
            return Number($('#splitTotalAmount').val()) || 0;
        }

        function getSplitTotalNote() {
            return $('#splitTotalNote').val().trim();
        }

        function updateSplitSummary() {
            const totalAmount = getSplitTotalAmount();
            const rowAmounts = Array.from(document.querySelectorAll('.split-amount')).map(el => Number(el.value) || 0);
            const rowSum = rowAmounts.reduce((sum, value) => sum + value, 0);
            const diff = Number((totalAmount - rowSum).toFixed(2));
            const payers = Array.from(document.querySelectorAll('.split-row')).map(row => {
                const payerSelect = row.querySelector('.split-payer-select');
                return payerSelect ? payerSelect.value : '';
            }).filter(payer => payer);
            const uniquePayers = [...new Set(payers)];
            const payerWarning = uniquePayers.length >= 2 ? ` <span style="color:red;">兩個付款人</span>` : '';
            document.getElementById('splitSummary').innerHTML = `已分配: ${rowSum.toFixed(2)} / 總金額: ${totalAmount.toFixed(2)}，誤差: ${diff.toFixed(2)}${payerWarning}`;
        }

        function splitAmountTabHandler(event) {
            if (event.key !== 'Tab') {
                return;
            }
            event.preventDefault();
            const amounts = Array.from(document.querySelectorAll('.split-amount'));
            if (amounts.length === 0) {
                return;
            }
            const currentIndex = amounts.indexOf(event.target);
            if (currentIndex === -1) {
                return;
            }
            let nextIndex = event.shiftKey ? currentIndex - 1 : currentIndex + 1;
            if (nextIndex < 0) {
                nextIndex = amounts.length - 1;
            } else if (nextIndex >= amounts.length) {
                nextIndex = 0;
            }
            amounts[nextIndex].focus();
        }

        function submitSplitRows() {
            const totalAmount = getSplitTotalAmount();
            const payMoneyNotes = getSplitTotalNote();

            if (isNaN(totalAmount) || totalAmount <= 0) {
                alert('請輸入正確的總金額');
                return;
            }

            const rows = Array.from(document.querySelectorAll('.split-row'));
            if (rows.length === 0) {
                alert('請先新增一筆分配資料');
                return;
            }

            const merged = {};
            let sumAmount = 0;
            const baseCode = Math.random().toString(36).slice(2, 7).toUpperCase();

            function formatAmount(value) {
                const formatted = parseFloat(value.toFixed(2));
                return `$${formatted % 1 === 0 ? formatted.toFixed(0) : formatted.toFixed(2)}`;
            }

            for (const row of rows) {
                const payerSelect = row.querySelector('.split-payer-select');
                const payer = payerSelect ? payerSelect.value : '';
                const amountInput = row.querySelector('.split-amount');
                const amountValue = amountInput ? amountInput.value.trim() : '';
                const amount = Number(amountValue);
                const users = Array.from(row.querySelectorAll('.split-user:checked')).map(o => o.value);
                const content = row.querySelector('.split-note').value.trim();

                if (!payer || users.length === 0 || amountValue === '' || isNaN(amount)) {
                    alert('請確認每一筆分配的付款人、使用人與金額都已填寫');
                    return;
                }

                const perUser = amount / users.length;
                sumAmount += amount;

                users.forEach(user => {
                    const key = `${payer}||${user}`;
                    if (!merged[key]) {
                        merged[key] = {
                            payer,
                            user,
                            amount: 0,
                            amountLabels: [],
                            contentLabels: [],
                        };
                    }
                    merged[key].amount += perUser;
                    merged[key].amountLabels.push(formatAmount(perUser));
                    merged[key].contentLabels.push(content ? content : '無備注');
                });
            }

            if (Number(sumAmount.toFixed(2)) !== Number(totalAmount.toFixed(2))) {
                alert('分配金額總和需等於總金額，請調整數值後再提交');
                return;
            }

            const submitEntries = Object.values(merged);
            if (submitEntries.length === 0) {
                alert('沒有可提交的分配帳單');
                return;
            }

            const uniqueUsers = Array.from(new Set(submitEntries.map(entry => entry.user)));
            const userCount = uniqueUsers.length;

            Promise.all(submitEntries.map(entry => {
                const index = uniqueUsers.indexOf(entry.user) + 1;
                const amountText = entry.amountLabels.join('+');
                const contentText = entry.contentLabels.join('+');
                const noteParts = [];
                if (payMoneyNotes) noteParts.push(payMoneyNotes);
                noteParts.push(amountText);
                noteParts.push(contentText);
                noteParts.push(baseCode);
                noteParts.push(`${index}/${userCount}`);
                const note = noteParts.join(' ');
                return submitEntry(entry.payer, entry.user, entry.amount.toFixed(2), note);
            }))
            .then(function () {
                alert('分配帳單已提交');
                show($('#ecToken').val());
                $('#howmuchmoney').val('');
                $('#payMoneyNotes').val('');
                $('#splitTotalAmount').val('');
                $('#splitTotalNote').val('');
                document.getElementById('splitRows').innerHTML = '';
                updateSplitSummary();
            })
            .catch(function (error) {
                if (error && error.message) {
                    alert(error.message);
                }
            });
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
        var currentMembers = [];

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

                    currentMembers = [];
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
                        currentMembers.push(response.data[i].mainpeople);
                    }

                    $('#number').html('');
                    $('#nameShow').html('');
                    $('#number').html(`${response.data.length}位`);
                    $('#nameShow').html(item.join(''));
                    refreshSplitOptions();


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

        function refreshDatabase() {
            const token = $('#ecToken').val();
            if (!token) {
                alert('請先輸入 TOKEN 後再刷新');
                return;
            }
            // 重新載入明細與已刪除資料
            showWaterBill();
            showdeldata();
            // 也可同步重新載入成員清單
            show(token);
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

        // 新增：控制顯示金額的小數點位數
        let decimalPlaces = 3;
        function toggleDecimalPlaces() {
            decimalPlaces = decimalPlaces === 2 ? 3 : (decimalPlaces === 3 ? 4 : 2);
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

            // 切換顯示時間按鈕 + 新增小數點切換按鈕
            item.push(`
            <tr id="eachpeople-toggle-row">
                <td colspan="3" style="text-align:right; background:#fff;">
                    <div style="display:flex; justify-content:flex-end; gap:8px;">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleDecimalPlaces()">
                            小數點：${decimalPlaces}位
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleEachPeopleTime()">
                            ${showEachPeopleTime ? '隱藏時間' : '顯示時間'}
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-info" style="margin-left:8px;" onclick="window.showDetailOwed = !window.showDetailOwed; eachpeoplefunction('${people}');">
                            ${window.showDetailOwed ? '隱藏詳細' : '顯示詳細'}
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger" style="margin-left:8px;" onclick="document.getElementById('eachpeople-toggle-row').style.display='none';">
                            X
                        </button>
                    </div>
                </td>
            </tr>
            `);

            // 已付錢項目
            item.push(`
            <tr>
            <th colspan="3" style="background:linear-gradient(90deg,#e8f5e9 0%,#f1f8e9 100%);color:#388e3c;font-size:1.1em;padding:10px 0;">
            <i class="fas fa-wallet" style="margin-right:6px;color:#616161;"></i>預付代支項目
            </th>
            </tr>
            `);

            let totalPaid = 0;
            if (response.data[0].length > 0) {
                for (let i = 0; i < response.data[0].length; i++) {
                let money = Number(response.data[0][i].howmuchmoney).toFixed(decimalPlaces);
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
                <td colspan="3" style="color:gray;text-align:center;">沒有預付代支項目</td>
                </tr>
                `);
            }
            item.push(`
            <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;background:#e8f5e9;">
            預付代支金額小結: <span style="color:#d84315;font-size:1.1em;text-align:right;display:inline-block;min-width:90px;">+${totalPaid.toFixed(decimalPlaces)}</span>
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
                let c = (Number(response.data[1][i].howmuchmoney) / b).toFixed(decimalPlaces);
                totalOwed += Number(c);

                // 詳細版內容
                let detailHtml = '';
                if (showDetailOwed) {
                    detailHtml = `<div style="font-size:0.9em;color:#888;">${Number(response.data[1][i].howmuchmoney).toFixed(decimalPlaces)} ÷ ${b} = ${c}</div>`;
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
            需要付款金額小結: <span style="color:#1976d2;font-size:1.1em;text-align:right;display:inline-block;min-width:90px;">-${totalOwed.toFixed(decimalPlaces)}</span>
            </td>
            </tr>
            `);

            // 總結
            let net = (totalPaid - totalOwed).toFixed(decimalPlaces);
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
            /* 移除外框 */
            border: none;
            padding: 20px 0 0 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .d2 {
            margin: 0px 20px 20px 0px;
            box-sizing: border-box;
            max-width: calc(50em + (20px + 1px) * 2);
            /* 移除外框 */
            border: none;
            background-color: rgba(250, 128, 114, 0.2);
            padding: 20px 0 0 20px;
            color: salmon;
        }

        .d3 {
            /* 進一步減少使用人/付款人區塊高度與間距，縮小內部下方空白 */
            margin: 0 10px 4px 0;
            min-height: auto;
            align-items: flex-start;
        }

        .split-row .form-group {
            /* 減少每個欄位之間垂直間距 */
            margin-bottom: 0.4rem;
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }

        .split-row .form-row {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        /* 移除由 bootstrap 'border' class 加上的外框 */
        .split-row.border {
            border: none !important;
            box-shadow: none !important;
        }

        .split-row .form-group.col-auto {
            flex: 0 0 auto;
        }

        .split-row .form-group.col {
            min-width: 140px;
            flex: 1 1 140px;
        }

        .split-payer,
        .split-users {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .split-payer-select {
            width: 100%;
        }

        .record-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .record-title span {
            display: inline-block;
        }

        .record-options {
            margin-bottom: 0.75rem;
        }

        .split-amount,
        .split-note {
            min-width: 110px;
            width: 100%;
            max-width: 100%;
        }

        .split-delete-btn {
            min-width: 70px;
            max-width: 70px;
        }

        .split-index {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            padding-top: 0.1rem;
            padding-bottom: 0.1rem;
        }

        /* 內容欄位與刪除按鈕同列排列，按鈕放在內容右方 */
        .split-content {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .split-content .split-note {
            flex: 1 1 auto;
            margin-right: 8px;
        }

        .split-delete-btn {
            margin-left: 0;
            flex: 0 0 auto;
        }

        /* 如果存在 label（只在第一筆會出現），把 label 放在輸入框上方 */
        .split-content > label {
            flex-basis: 100%;
            display: block;
            margin-bottom: 4px;
        }

        /* controls 容器：確保輸入框與刪除按鈕同排且不換行 */
        .split-content-controls {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .split-content-controls .split-note {
            flex: 1 1 auto;
            min-width: 0; /* allow shrinking inside flex */
        }

        .index-num {
            font-weight: 700;
            color: #333;
        }

        @media (max-width: 768px) {
            .split-row .form-group {
                flex: 1 1 100%;
                min-width: 100%;
            }
        }

        .d3 input[type="radio"]+span,
        .d3 input[type="checkbox"]+span {
            display: inline-block;
            margin: 0px 5px 5px 0px;
            cursor: pointer;
            /* 移除選項外框 */
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
            /* 減少內部 padding，使選項高度更窄 */
            padding: 6px 12px;
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
    </>
</body>
