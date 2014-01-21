<div class="vbx-applet">

		<h2>Audio Choice</h2>
		<p>When the caller reaches this prompt, they will hear the following.<br>You can use variables to replace names from CRM:<br>%caller_first_name% - caller`s first name<br>%caller_last_name% - caller`s last name<br>%called_first_name% - first name of called party<br>%called_last_name% - last name of called party</p>
		<?php echo AppletUI::AudioSpeechPicker('prompt'); ?>

		<br />

		<h2 class="settings-title">Next</h2>
		<p>After the initial prompt, continue to the next applet</p>
		<div class="vbx-full-pane">
			<?php echo AppletUI::DropZone('next'); ?>
		</div><!-- .vbx-full-pane -->

</div><!-- .vbx-applet -->
