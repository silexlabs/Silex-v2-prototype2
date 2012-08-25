<xml>
	<!--
		<?php
			exit("access denied
	-"."->
</"."xml>");
		?>
	-->
	<state>Private</state>
	<publicationFolder>../publication-data/test-read/</publicationFolder>
	<creation>
		<author>silexlabs</author>
		<date>2021-12-02 00:00:00</date>
	</creation>
	<lastChange>
		<author>silexlabs</author>
		<date>2021-12-02 00:00:00</date>
	</lastChange>
	<debugModeAction>
		//Lib.alert("test!");
		Builder.loadPublication("test1");
		Page.openPage("Builder", false, {
			debugModeAction: "Lib.alert('test2');",
		}, slpid);
	</debugModeAction>
</xml>