<!------- Page Contact ------->

<div id="contact">

    <div class="intro">

        <h1>CONTACT</h1>

        <h2>Si vous souhaitez me poser une question, collaborer, demander un devis... Suivez le guide!</h2>

    </div>

    <!------- Mail etc ------->

    <h5>
        Elodie HAK <br/>
        Toulouse - Patte d'Oie<br/>
    </h5>

    <!------- Formulaire ------->

    <form method="post" action="content/traitement.php">
        <fieldset id="coordonnees">

            <label>Nom : </label>
            <input type="text" name="nom"/><br />
            <label>Email : </label>
            <input type="text" name="email"/><br />

            <p id="sujet"><label>Sujet:</label>
                <input type="checkbox" name="sujet" value="question" />Question
                <input type="checkbox" name="sujet" value="devis" />Demande de devis
                <input type="checkbox" name="sujet" value="collaboration" />Collaboration
                <input type="checkbox" name="sujet" value="autre" />Autre
            </p>
        </fieldset>
        <p class="titre">Message</p>
        <fieldset id="message">
            <textarea name="comments" rows="20" cols="100"></textarea>
        </fieldset>

        <p id="buttons">
            <input type="submit" value="Envoyer" />
            <input type="reset" value="Recommencer" />
        </p>
    </form>

</div>