<h1>輔大機車停車(parking where)</h1>

<ui>
  <li>程式語言: html, php</li>
  <li>伺服器: Apache</li>
  <li>資料庫: MyAQL</li>
</ui>

<h3>第一章 系統描述</h3>
<h4>一、發展背景與動機</h4>
<p>身為一位每天都要騎 40～50 分鐘的車程到學校的機車通勤族，學校附近有沒有車位就變得 非常重要。常常有時候 10 點到學校的時候法籃停車場都沒有車位了，然後又花了很多的時間在學 校附近尋找空的車位導致上課遲到，這也造成了我極大的不便。開發這項軟體是希望能更方便更快 速的尋找到車位，才不用從法籃到魔鬼巷甚至跑到貴子路上來回的尋找車位。目前市面上的找車位 app 幾乎都是以開車族的立場去做發想與設計的，以汽車停車場為主，也缺少了路邊公有停車格的即時資訊，這樣的環境對機車族非常不友善。而且騎機車的人們多是為了其機動性高的性質，更需 要的是路邊臨時性的停車格空缺資訊，此外，目前有提供機車停車的停車場也比較少見，由此可得知，要迅速停好車可謂一大難題。若有一個 app 能夠以機車族的立場做設計，能夠及時掃描多個區域的路邊車格使用情況，並統整公有及私有機車停車場的空缺資訊，那可謂一大福音。</p>
 
<h4>二、系統發展目的</h4>  
<p>為了讓機車通勤族快速得知其目的地的附近的停車資訊，希望可以快速找到適合自己的車位以節省時間，另一方面希望可以即時得知目的地附近停車格的即時狀況，已提早準備或改用備案，也能避開巔峰時段，也不用跟別人卡同一車位。由於目前尚未有完整技術可捕捉路邊停車格即時狀況，所以可以以傳統汽車路邊停車收費方式，一邊記錄價錢、一邊回報即時狀況，甚至在 APP 有使用者討論區，讓他們彼此分享現況。我們為了讓使用者可以快速得知哪裡還有空位，所以特別設定可以即時掃描多個區域路邊車 格使用狀況之功能，像是: 輔大學生快遲到了，可以快速掃描學校附近車位狀況，如此一來，可以大大的節省時間，減少遲到的機率。為了保護 APP 使用者的隱私安全，我們希望可以滿足下列幾點:  
  <ui>
    <li>系統內綁定的個資、車號不會遭人惡意竄改、外洩。</li>
    <li>確保使用者在註冊之前都已詳讀同意書之內容。</li>
    <li>系統獲取使用者位置資訊時，必須得經過其同意，並不得任意暴露。</li>
</p> 
<table>
  <tr>
    <td>問題</td>
    <td>解決方案</td>
  <tr>
  <tr>
    <td>無法獲取路邊機車格即時資訊</td>
    <td>利用使用者回報即時更新資料</td>
  </tr>
</table>

<h4>三、系統範圍</h4>
<p>我們依需求規劃了幾個重要的功能與資訊點，其中包含查找停車場、停車場資訊、車位即時資 訊等項目: </p>
<ui>
  <li>查找停車場：我們查詢可供停車的車位時，第一步就是要先從大量停車場中過濾出使用者目前最 方便、最可能使用的。依此目的，系統會根據兩個條件來做篩選與推薦；一為通過使用者輸入的地 址查找該地址或其附近的停車場，二為使用者曾經在此停過的歷史紀錄。另外，在查找停車場的過 程中，也可以提高各停車場的曝光率。</li>
  <li>停車場資訊：若想更清楚的了解該停車場的資訊，我們將提供其他使用者的評分，另有實際相片 與收費資訊等等，供使用者做為參考用。當使用者鎖定特定停車場時，系統會自動連動 Google Map，協助使用者前往該停車場。</li>
  <li>(3) 車位即時資訊：找停車場最重要的是確認裡面有無可停的車位，所以我們將停供該停車場的總車位資訊，以及當前剩餘車位資訊，以供使用者決定是否要前往該地。</li> 
  <li>(4)會員制度：非會員者只能搜尋停車場，註冊後即可成為一般會員，得以查看停車場相關資訊，抵 達停車場後，若進行停車場情況回報，可獲得點數 2 點。另外設有付費會員，可設定特定會員專屬 圖標，且享有免廣告服務，費用一個月為$50NTD，可至超商儲值或是透過信用卡儲值，點數 50 點 即可折抵會員費$25NTD。</li> 
  </li>(5)刊登廣告：在部分功能內，對一般會員或非會員需要看廣告，以停車場附近店家為廣告主，吸引廣告主的興趣，讓廣告主可以宣傳店家的相關資訊，並且投資我們繼續研發此 app。</li>
  <li>(6)圖標小舖：會展示各種不同的車像圖標供使用者裝飾自己的 APP 版面，若為付費會員，所有圖 標將會標記成免費，並享有付費會員專區圖標；若為一般會員，則可以利用點數進行兌換，無法享有付費會員專區圖標。</li> 
  <li>(7)使用者回報：透過使用者回報即時蒐集各停車場所剩車位之資訊，尤其是路邊的共用停車場，並利用此資訊改善系統的 bug。</li> 
  <li>(8)檢舉機制：為避免錯誤訊息誤導其他使用者，如：資訊與實際情況不符、無意義的留言、圖片 等，使用者可使用檢舉功能舉報有疑慮的使用者回報，我們將依檢舉內容審查違規與否。若檢舉成功可以獲得點數。</li>
</ui>

<h4>四、系統限制</h4>
<ui>
  <li>(1)線上付款：由於此部分需要經過停車場負責人與銀行洽談，若他們確立合作關係，我們也會盡力將此功能加入我們的應用程式當中。</li>
  <li>(2)註冊：目前系統只提供基本功能。Facebook、Google、Apple ID 的連動註冊登入我們以模擬 表示。</li>
  <li>(3)儲值：目前系統只接受信用卡以及超商儲值，超商部分只與全家、7-11、萊爾富合作。有一個銀 行帳號，再與超商連動生成繳款代碼後，可以再前往超商，利用超商的系統進行代收繳款。在這裡 我們以模擬表示。</li>
  <li>(4)剩餘車位：剩餘車位將會以停車場場主提供的資料為主，目前因為無合作停車場，因此以亂數模 擬表示。</li>
  <li>(5)附近停車場：因技術問題，此處以模擬表示。</li>
</ui>

<h4>五、資料庫設計</h4>
<p>備註</p>
<ui>
  <li>PK:Primary Key</li>
  <li>FK:Foreign Key</li>
  <li>AI:Auto Increment</li>
  <li>NN:Not Null</li>
</ui>

<h5>User</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>INT()</td>
    <td>使用者編號 PK AI NN</td>
  </tr>
  <tr>
    <td>password</td>
    <td>VarChar(20)</td>
    <td>密碼 NN</td>
  </tr>
  <tr>
    <td>nickname</td>
    <td>VarChar(20)</td>
    <td>暱稱 NN</td>
  </tr>
  <tr>
    <td>email</td>
    <td>TEXT</td>
    <td>信箱 NN</td>
  </tr>
  <tr>
    <td>phone</td>
    <td>VarChar(10) </td>
    <td>電話</td>
  </tr>
  <tr>
    <td>authority</td>
    <td>INT(1)</td>
    <td>權限 NN</td>
  </tr>
  <tr>
    <td>point</td>
    <td>INT(5)</td>
    <td>點數</td>
  </tr>
  <tr>
    <td>icon_id</td>
    <td>VarChar(50)</td>
    <td>圖標 NN</td>
  </tr>
  <tr>
    <td>icon_loot</td>
    <td>VarChar(100)</td>
    <td>圖標倉庫 NN</td>
  </tr>
</table>

<h5>Parking_Lot</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>p_id</td>
    <td>INT()</td>
    <td>停車場編號 PK AI NN</td>
  </tr>
  <tr>
    <td>name</td>
    <td>VarChar(30)</td>
    <td>停車場名稱 NN</td>
  </tr>
  <tr>
    <td>address</td>
    <td>TEXT</td>
    <td>停車場地址 NN</td>
  </tr>
  <tr>
    <td>price</td>
    <td>VarChar(10)</td>
    <td>收費 NN</td>
  </tr>
  <tr>
    <td>type</td>
    <td>VarChar(8)</td>
    <td>停車場種類 NN</td>
  </tr>
  <tr>
    <td>way</td>
    <td>VarChar(8)</td>
    <td>繳費方法 NN</td>
  </tr>
  <tr>
    <td>information</td>
    <td>TEXT</td>
    <td>詳細資訊</td>
  </tr>
  <tr>
    <td>p_photo_b</td>
    <td>TEXT</td>
    <td>停車場照片-大 NN</td>
  </tr>
  <tr>
    <td>p_photo_s</td>
    <td>TEXT</td>
    <td>停車場照片-小 NN</td>
  </tr>
  <tr>
    <td>remain</td>
    <td>INT(3)</td>
    <td>剩餘車位 NN</td>
  </tr>
</table>

<h5>Comment</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>c_id</td>
    <td>INT()</td>
    <td>評論編號 PK AI NN</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>INT()</td>
    <td>使用者編號 FK(User.user_id) NN</td>
  </tr>
  <tr>
    <td>p_id</td>
    <td>INT()</td>
    <td>停車場編號 FK(Parking_Lot.p_id) NN</td>
  </tr>
  <tr>
    <td>time</td>
    <td>timestamp</td>
    <td>時間 NN</td>
  </tr>
  <tr>
    <td>environment</td>
    <td>INT(3)</td>
    <td>周圍環境</td>
  </tr>
  <tr>
    <td>ordering</td>
    <td>INT(3)</td>
    <td>停車秩序</td>
  </tr>
  <tr>
    <td>balance</td>
    <td>INT(3)</td>
    <td>剩餘車位量</td>
  </tr>
  <tr>
    <td>opinion</td>
    <td>TEXT</td>
    <td>其他意見 </td>
  </tr>
  <tr>
    <td>advice</td>
    <td>TEXT</td>
    <td>對系統建議</td>
  </tr>
  <tr>
    <td>c_photo</td>
    <td>INT(3)</td>
    <td>評論照片</td>
  </tr>
</table>

<h5>Reported</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>r_id</td>
    <td>INT()</td>
    <td>檢舉編號 PK NN</td>
  </tr>
  <tr>
    <td>c_id</td>
    <td>INT()</td>
    <td>評論編號 FK(Comment.c_id) NN</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>INT()</td>
    <td>使用者編號 FK(User.user_id) NN</td>
  </tr>
  <tr>
    <td>reason</td>
    <td>TEXT</td>
    <td>檢舉理由 NN</td>
  </tr>
  <tr>
    <td>state</td>
    <td>VarChar(10)</td>
    <td>審核狀況 NN</td>
  </tr>
</table>

<h5>Favorite</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>f_id</td>
    <td>INT()</td>
    <td>清單編號 PK AI NN</td>
  </tr>
  <tr>
    <td>p_id</td>
    <td>INT()</td>
    <td>停車場編號 FK(Parking_Lot.p_id) NN</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>INT()</td>
    <td>使用者編號 FK(User.user_id) NN</td>
  </tr>
</table>

<h5>Credit</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>INT()</td>
    <td>使用者編號 FK(User.user_id) NN</td>
  </tr>
  <tr>
    <td>cr_id</td>
    <td>INT()</td>
    <td>點數紀錄編號 PK AI NN</td>
  </tr>
  <tr>
    <td>cr_value</td>
    <td>INT()</td>
    <td>點數變動量 NN</td>
  </tr>
  <tr>
    <td>cr_name</td>
    <td>VarChar()</td>
    <td>點數紀錄名稱</td>
  </tr>
  <tr>
    <td>cr_date</td>
    <td>timestamp</td>
    <td>點數紀錄時間 NN</td>
  </tr>
</table>

<h5>Icon</h5>
<table>
  <tr>
    <td>名稱</td>
    <td>型態</td>
    <td>說明</td>
  </tr>
  <tr>
    <td>i_id</td>
    <td>INT()</td>
    <td>圖標編號 PK AI NN</td>
  </tr>
  <tr>
    <td>category</td>
    <td>INT()</td>
    <td>圖標分類 NN</td>
  </tr>
  <tr>
    <td>i_photo</td>
    <td>INT()</td>
    <td>圖標名稱 NN</td>
  </tr>
</table>

<h4>六、介面設計</h4>
<h5>使用者首頁(進入頁.php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176591876-3dd37249-9dce-4cb6-aa05-46c5a49692f7.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176591903-0228d09d-5fec-4fdc-ad11-dddf92e7751f.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176591927-8b7b0673-8161-47b3-8e03-c9420beb59ea.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176591940-d5228bd4-f537-4e17-8142-c74a4a41e970.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176591988-8075b83a-8b89-4277-8ea9-60a56db5f713.png)<br>

<h5>搜尋頁面(搜尋結果.php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592053-22f1b4af-880c-4f3f-92e0-69726105545c.png)<br>

<h5>登入頁面(登入.html)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592133-93b8c094-5dc4-403d-a203-d3d721b9e064.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592104-8f07cdc1-e15e-422f-9ae4-55a8725621ea.png)<br>

<h5>停車場詳細資訊(停車場詳細資訊1_1.4_.php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592191-6b4362bc-7a7b-4643-84d7-e6432f25fbae.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592215-f510860e-9e3a-45f6-9243-3fe25e9353df.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592232-0a23b8d3-2a63-4dd7-8a79-bc125aa2e1a4.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592245-ff7759c0-ca8e-47eb-bcd2-7ecaf03ee95d.png)<br>

<h5>檢舉頁面(檢舉評論.php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592402-f847ef6d-1965-4956-be3b-6450294531f0.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592433-c55c1c20-bfe2-4999-a0cb-6a3f0df4be50.png)<br>

<h5>使用者回報(回報停車場狀況.php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592495-bef4ed54-c4b1-4928-a8d7-196584cb28c8.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592502-bcd3459d-3f1b-4f7a-9629-b88641694006.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592535-7204cd30-18d5-41d5-8e09-2eeccb520d70.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592566-3d97dc43-b45b-4aff-ae13-5d39d870b08b.png)<br>

<h5>導航頁面(導航(2.1).php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592637-dc233fc9-762d-4030-b281-f856319fb278.png)<br>

<h5>設定頁面(個人資料.php)</h5>
![image](https://user-images.githubusercontent.com/83577156/176592681-c3652bfb-4322-4ed2-b7af-c61215344f09.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592695-57f95be9-44b8-44c2-b131-e3c67f8035dc.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592737-4ef170b4-e449-4d64-88de-521a28464050.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592754-8dcd1a7e-04c6-467d-9434-da61d1f83771.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592766-f644364c-dcb2-4e15-b7fa-fe21118aa08e.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592779-95095a60-576c-48f2-a0f7-e8c4fb3ccc98.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592800-c5712000-8503-44b8-8c09-798f7f9ad5bc.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592813-6b95cfb9-54cf-414b-b36c-cccfae435791.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592825-a79765e5-ec1e-4d3a-b842-aadf2ddc9236.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592837-2868f3e5-9b4d-40fa-92e9-8283b1072f70.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592852-482d1ee4-d897-48f7-8788-4a7d377ddd04.png)<br>
![image](https://user-images.githubusercontent.com/83577156/176592866-dc4c26f8-1f3b-48a9-9ecc-7c2cda796600.png)<br>
