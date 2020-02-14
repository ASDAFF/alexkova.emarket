<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?$APPLICATION->ShowHead();?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-1.10.2.min.js");?>
<style>

	html, body{
		padding:0; margin: 0;
		background: transparent;
	}

	.message{

		background: #00cc99;
		color: #FFF;
		width: 80%;
		padding: 20px 10px;
		margin: 0 auto;
		margin-top: 40px;
		text-align: center;
	}

	.red-button{
		padding: 10px 40px 12px;
		cursor: pointer;
	}

</style>

<div class="message">
	Спасибо за ваше обращение.<br /><br />
	Ваша заявка принята в обработку
<br />
	<br />
	<input type="button" id="close_window" class="red-button" value="Закрыть окно">
</div>

	<script>
		$(document).ready(function(){

			$('#close_window').click(function(){
				window.parent.phonePopup.close();
				window.parent.phonePopup.destroy();
			});
			});
	</script>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>