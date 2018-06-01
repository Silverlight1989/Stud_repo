<? 
//Научить движок запоминать 5 последних просмотренных страниц. Выводить их в личном кабинете блоком “Вы недавно смотрели”.
$user = $_SESSION['userid'];      // ключ клиента 

$old_goods = @$_COOKIE['goods'][$user];  // товары, ранее просматривавшиеся  
if(!empty($old_goods))$old_goods = explode(',', $old_goods); // этим клиентом (если есть) 
$new_goods = array(......);  // товары, просмотренные в данном сеансе (из прайса)  

if(empty($old_goods)) $old_goods = array();  // сливаем массивы, убирая дубли 
$o_goods = implode(',', array_unique(array_merge($old_goods, $new_goods))); 

setcookie("goods[$user]",$o_goods, time()+86400);  // запоминаем под этим клиентом 
$_SESSION['looked'][] = '<a title="'.$nazv.'" href="item.php?mod=cat&cat_id='.$good.'_id&good_id='.$good_id'"><img class="photo" src="pic/tov/sm_'.$picture.'"></a>';
 
 
$links = array_unique($_SESSION['looked']);
if (count($links)>5) {
array_shift($links );
$_SESSION['looked'] = $links;
 
 
}
//добавление
 
if (!in_array($new_link, $_SESSION['looked'])) {
$_SESSION['looked'][] = $new_link;
}

foreach($links as $value){
echo $value;
}
?>