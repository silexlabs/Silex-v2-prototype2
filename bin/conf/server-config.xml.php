<xml>
	<!--
		<?php
			exit("access denied
	-"."->
</"."xml>");
		?>
	-->
	<defaultPublication>test1</defaultPublication>
	<admin>silexlabs</admin>
	<debugModeAction>
		//Lib.alert("test!");
		Builder.loadPublication("test1");
		Page.openPage("Builder", false, null, slpid);
	</debugModeAction>
</xml>