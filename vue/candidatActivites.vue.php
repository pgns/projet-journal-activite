<!-- Content -->
	<div id="content">
            <div id="gen_new_content" title="Nouvel événement">
                <form action="">
                    <label class="label_evenement" for="new_event_title">Categorie Activitée : </label><input type="text" class="lab" name="new_event_title" id="new_event_title" /><br />
                    <label class="label_evenement" for="new_event_title">Activitée : </label><input type="text" class="lab" name="new_event_title" id="new_event_title" /><br />
                    <label class="label_evenement" for="new_event_title">Categorie Lieu : </label><input type="text" class="lab" name="new_event_title" id="new_event_title" /><br />
					<label class="label_evenement" for="new_event_lieu">Lieu : </label><input type="text" class="lab" name="new_event_lieu" id="new_event_lieu" /><br />
                    <label class="label_evenement" for="new_event_title">Compagnie : </label><input type="text" class="lab" name="new_event_title" id="new_event_title" /><br />
                    <label class="label_evenement" for="new_event_title">Dispositif : </label><input type="text" class="lab" name="new_event_title" id="new_event_title" />
                </form>
            </div>

            <div id="gen_new_calendar" title="Nouvel agenda">
                <form action="">
                    <label class="label_evenement" for="new_calendar_title">Titre : </label><input type="text" class="lab" name="new_calendar_title" id="new_calendar_title" />
                </form>
            </div>
            <div id="create_event"></div>
            <div id="ajax_load" class="info_activation_module"></div>
            <div id="dialog" title="Suppression">Veuillez confirmer la suppression</div>
            <div id="switcher_agenda_options">
                <div id="choix_plage_horaire">
                    <a class="info" href="/Backoffice/admin/evenements/index/d/04/m/01/y/2010"><img src="../img/bef_week.png" alt="before" /><span>04/01/2010 au 10/01/2010</span></a>
                    <a class="info" href="/Backoffice/admin/evenements/index/d/18/m/01/y/2010"><img src="../img/next_week.png" alt="next" /><span>18/01/2010 au 24/01/2010</span></a>
                    <span class="semaine_en_cours">Semaine du 11/01/2010 au 17/01/2010</span>

                </div>
            </div>
            <div id="calendrier">
                <table id="calendar_table">
                    <thead>
                        <tr>
                            <th></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/11/m/01/y/2010">Lu. 11/01</a></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/12/m/01/y/2010">Ma. 12/01</a></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/13/m/01/y/2010">Me. 13/01</a></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/14/m/01/y/2010">Je. 14/01</a></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/15/m/01/y/2010">Ve. 15/01</a></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/16/m/01/y/2010">Sa. 16/01</a></th>
                            <th><a  href="/Backoffice/admin/evenements/journee/d/17/m/01/y/2010">Di. 17/01</a></th>
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
                                <div class='info_horaires_content'>23h00</div>                                    </td>
                            <td valign="top" class="other_day calendar_td" id="1263164400"> </td>
                            <td valign="top" class="other_day calendar_td" id="1263250800"> </td>
                            <td valign="top" class="other_day calendar_td" id="1263337200"> </td>
                            <td valign="top" class="other_day calendar_td" id="1263423600"> </td>
                            <td valign="top" class="other_day calendar_td" id="1263510000"> </td>
							<td valign="top" class="other_day calendar_td" id="1263596400"> </td>
                            <td valign="top" class="other_day calendar_td" id="1263682800"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div>

