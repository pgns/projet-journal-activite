<!-- Content -->
	<div id="content">
            <div id="gen_new_content" title="Nouvel événement">
                <form action="">
                    <label class="label_evenement" for="new_event_categorieActivite">	Categorie Activitée :</label>
                    <select type="text" class="lab RA_target" name="new_event_categorieActivite" id="new_event_categorieActivite">
							<?php foreach($liste_CategorieActivite as $id => $object){
									echo'<option id="'.$object->CodeCategorieActivite.'">'.$object->NomCategorie.'</option>';}
							?>
					</select><br />
					
                    <label class="label_evenement" for="new_event_activite">			Activitée :</label>
                    <select type="text" class="lab RA_activ" name="new_event_activite" id="new_event_activite" >
							<?php foreach($liste_ActiviteDefault as $id => $object){
									echo'<option id="'.$object->CodeActivite.'">'.$object->NomActivite.'</option>';}
							?>
					</select><br />
					
					
					
					
                    <label class="label_evenement" for="new_event_categorieLieu">		Categorie Lieu :</label>
					<select type="text" class="lab RA_target" name="new_event_categorieLieu" id="new_event_categorieLieu" >
							<?php 
								foreach($liste_CategorieLieu as $id => $object){
									echo'<option id="'.$object->CodeCategorieLieux.'">'.$object->NomCategorie.'</option>';}
							?>
					</select><br />
					
					<label class="label_evenement" for="new_event_lieu">				Lieu :</label>
					<select type="text" class="lab RA_Lieu" name="new_event_lieu" id="new_event_lieu">
							<?php
								foreach($liste_LieuDefault as $id => $object){
									echo'<option id="'.$object->CodeLieux.'">'.$object->NomLieux.'</option>';}
							?>
					</select><br />
                    
                    <label class="label_evenement" for="new_event_compagnie">			Compagnie :</label>
                    <input type="text" class="lab" name="new_event_compagnie" id="new_event_compagnie" /><br />
                   
                    <label class="label_evenement" for="new_event_dispositif">			Dispositif :</label>
                    <input type="text" class="lab" name="new_event_dispositif" id="new_event_dispositif" />
                </form>
            </div>

            <div id="gen_new_calendar" title="Nouvel agenda">
                <form action="">
                    <label class="label_evenement" for="new_event_activite">Activitée : </label><input type="text" class="lab" name="new_event_activite" id="new_event_activite" />
                </form>
            </div>
            <div id="create_event"></div>
            <div id="ajax_load" class="info_activation_module"></div>
            <div id="dialog" title="Suppression">Veuillez confirmer la suppression</div>
<!--
            <div id="switcher_agenda_options">
                <div id="choix_plage_horaire">

                    <a class="info" href=""><img src="../img/bef_week.png" alt="before" /><span>04/01/2010 au 10/01/2010</span></a>
                    <a class="info" href=""><img src="../img/next_week.png" alt="next" /><span>18/01/2010 au 24/01/2010</span></a>
                    <span class="semaine_en_cours"><?php //echo 'Semaine du '.$currentWeek[0].' au '.$currentWeek[6];?></span>

                    <span class="semaine_en_cours"></span>
					<?//php echo genererChoixSemaine($currentWeek,date("Y"));?>
                </div>
            </div>
-->
            <?php echo genererChoixSemaine($Week,date("Y"));?>
            <div id="calendrier">
                <table id="calendar_table">
                    <thead>
                        <tr>
                            <th></th>
                            <?php
								remplirEnteteCalendar($Week);
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="info_horaires">
                                <div class='info_horaires_content'>00h00</div>
                                <div class='info_horaires_content'>01h00</div>
                                <div class='info_horaires_content'>02h00</div>
                                <div class='info_horaires_content'>03h00</div>
                                <div class='info_horaires_content'>04h00</div>
                                <div class='info_horaires_content'>05h00</div>
                                <div class='info_horaires_content'>06h00</div>
                                <div class='info_horaires_content'>07h00</div>
                                <div class='info_horaires_content'>08h00</div>
                                <div class='info_horaires_content'>09h00</div>
                                <div class='info_horaires_content'>10h00</div>
                                <div class='info_horaires_content'>11h00</div>
                                <div class='info_horaires_content'>12h00</div>
                                <div class='info_horaires_content'>13h00</div>
                                <div class='info_horaires_content'>14h00</div>
                                <div class='info_horaires_content'>15h00</div>
                                <div class='info_horaires_content'>16h00</div>
                                <div class='info_horaires_content'>17h00</div>
                                <div class='info_horaires_content'>18h00</div>
                                <div class='info_horaires_content'>19h00</div>
                                <div class='info_horaires_content'>20h00</div>
                                <div class='info_horaires_content'>21h00</div>
                                <div class='info_horaires_content'>22h00</div>
                                <div class='info_horaires_content'>23h00</div>                                    
                            </td>
                            <?php
								//var_dump($_SESSION);
								print_table($queryWeek,$_SESSION['id'],$bdd);
                            ?>
<!--
                            <td valign="top" class="other_day calendar_td" id="Lu">
							
								<div class="calendar_event" id="16" style="height:260px; margin-top:180px;">
                                    <div class="calendar_event_date" id="16_date" >
                                        <span id="16_date_debut_heure">04</span>:
                                        <span id="16_date_debut_minute">30</span> -
                                        <span id="16_date_fin_heure">11</span>:
                                        <span id="16_date_fin_minute">00</span>
                                    </div>
                                    <div class="calendar_event_activite" id="17_title">toto</div>
                                    <div class="calendar_event_lieu" id="16_lieu" style="display:none;">(Inconnu)</div>
                                </div>
								
							</td>
                            <td valign="top" class="other_day calendar_td" id="Ma"> </td>
                            <td valign="top" class="other_day calendar_td" id="Me"> </td>
                            <td valign="top" class="other_day calendar_td" id="Je"> </td>
                            <td valign="top" class="other_day calendar_td" id="Ve"> </td>
							<td valign="top" class="other_day calendar_td" id="Sa"> </td>
                            <td valign="top" class="other_day calendar_td" id="Di"> </td>
-->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div>

