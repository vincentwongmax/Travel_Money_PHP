<HEAD>
</HEAD>

<BODY>
    <form name=fm method=post action="#">
        <p>
            <table border=1 cellspacing=0 width=60%>
                <tr>
                    <td with=50%>
                        <input type=checkbox name=item value="物品A"> 物品A </td>
                    <td with=25%> 每個 $12.00
                        <input type=hidden name=price value=12> </td>
                    <td width=25%> 數量：<input type=text name=quan size=3> </td>
                </tr>
                <tr>
                    <td>
                        <input type=checkbox name=item value="物品B"> 物品B </td>
                    <td> 每瓶 $25.00 <input type=hidden name=price value=25> </td>
                    <td> 數量：<input type=text name=quan size=3> </td>
                </tr>
                <tr>
                    <td>
                        <input type=checkbox name=item value="物品C"> 物品C </td>
                    <td> 每支 $18.00 <input type=hidden name=price value=18> </td>
                    <td> 數量：<input type=text name=quan size=3></td>
                </tr>
                <tr>
                    <td>
                        <input type=checkbox name=item value="物品D"> 物品D </td>
                    <td> 每套 $50.00 <input type=hidden name=price value=50> </td>
                    <td> 數量：<input type=text name=quan size=3></td>
                </tr>
            </table>
            <p>
                <input type=button value="計算總額" onClick="checkIt()"> <input type=reset value="清除資料">
    </form>



    <script type="text/javascript" language="JavaScript">
        function checkIt() {
            for (i = 0; i <= (document.fm.item.length - 1); i++) {
                if (document.fm.item[i].checked && document.fm.quan[i].value <= 0) {
                    alert("你選了 " + document.fm.item[i].value + "，請填上數量。")
                    return
                }
            }


            buyItem = "" //這是選購物品的名稱及數量。
            totalSum = 0 //這是選購的總金額。
            //以下部份將選購物品的名稱、數量及總金額記在兩個變數內。
            for (i = 0; i <= (document.fm.item.length - 1); i++) {
                if (document.fm.item[i].checked) {
                    buyItem += (document.fm.item[i].value + "，數量= " +
                        document.fm.quan[i].value + " 。
                        " )
                        totalSum += (document.fm.price[i].value *
                            document.fm.quan[i].value)
                    }
                }
                if (totalSum == 0) {
                    alert("你沒有選購任何貨品。");
                    return
                }


                msgWin = window.open("sendbuy.htm", "win2", "width=400,height=300")
                msgWin.moveTo(120, 90)

            }
    </script>


</BODY>