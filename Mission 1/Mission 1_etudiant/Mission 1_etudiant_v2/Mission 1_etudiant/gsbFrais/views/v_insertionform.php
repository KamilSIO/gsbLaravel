<div id="contenu">
    <h2>Insertion</h2>
    
    <form action="index.php?uc=cumulfrais&action=apresinsertion" method="post">
    <div class="corpsForm">
        <ul>
            <h3>Saisie: </h3>
            <li>
            <p>
	 
      <label for="typeforfait" accesskey="n">type forfait : </label>
        <select id="identifiant" name="id">
            <?php
			foreach ($lesid as $unid)
			{
			    $id = $unid['prenom'] ." ". $unid['nom'];

      ?><option selected value="<?php echo $unid['id'] ?>"><?php echo $id?></option>
				<?php 
				}
           
		   ?>    
            
        </select>
      </p>
            </li>
            <li>
            <label for="msg">Anéee</label>
            <input type="text" name="lstannee"></textarea>

      <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstmoiss">
            <option selected value="01">Janvier</option>
            <option  value="02">Février</option>
            <option  value="03">Mars</option>
            <option  value="04">Avril</option>
            <option  value="05">Mai</option>
            <option  value="06">Juin</option>
            <option  value="07">Juillet</option>
            <option  value="08">Aout</option>
            <option  value="09">Septembre</option>
            <option  value="10">Octobre</option>
            <option  value="11">Novembre</option>
            <option  value="12">Decembre</option>
        </select>
            </li>
            <H3>Frais au forfait</H3>
            <li>
            <label for="msg">Repas midi</label>
            <input type="number" min="0" step="1" id="msg" name="rep"></textarea>
            </li>
            <li>
            <label for="msg">Nuitée</label>
            <input type="number" min="0" step="1" id="msg" name="nui"></textarea>
            </li>
            <li>
            <label for="msg">Kilomètre</label>
            <input type="number" min="0" step="1" id="msg" name="km"></textarea>
            </li>
            <li>
            <label for="msg">Etape</label>
            <input type="number" min="0" step="1" id="msg" max="31" name="etp"></textarea>
            </li>
        </ul>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p> 
      </div>
    </form>