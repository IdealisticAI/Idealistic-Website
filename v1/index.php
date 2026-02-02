<?php
require '/var/www/.structure/library/base/form.php';
require '/var/www/.structure/library/idealistic_office/init.php';

// Key Handling
$recaptcha_secret_key_data = get_keys_from_file("google_recaptcha", 1);
$recaptcha_secret_key = ($recaptcha_secret_key_data === null) ? "" : $recaptcha_secret_key_data[0];
$recaptcha_site_key = '6Lf_zyQUAAAAAAxfpHY5Io2l23ay3lSWgRzi_l6B';

// Helper
$appName = IdealisticOfficeVariable::APPLICATION_NAME;

// Flag Mapping
$flags = [
    'english' => '🇬🇧', 'greek' => '🇬🇷', 'spanish' => '🇪🇸', 'french' => '🇫🇷',
    'german' => '🇩🇪', 'italian' => '🇮🇹', 'portuguese' => '🇵🇹', 'dutch' => '🇳🇱'
];

$translations = [
    'english' => [
        'brand' => $appName,
        'nav_home' => 'Home', 'nav_features' => 'Tools', 'nav_usecases' => 'Demo', 'nav_contact' => 'Login / Contact',
        'cta_request' => 'Start Now', 'cta_explore' => 'How it works', 'label_dark' => 'Dark Mode',

        'h1' => 'Your office is now a chat room.',
        'lead' => 'Stop clicking through complex dashboards. Manage your team, track sales, and assign tasks directly inside WhatsApp, Telegram, or Discord.',

        'pill_1_title' => 'Works Everywhere', 'pill_1_desc' => 'WhatsApp, Telegram, Email',
        'pill_2_title' => 'Zero Training', 'pill_2_desc' => 'If you can text, you can use it',
        'pill_3_title' => 'Private', 'pill_3_desc' => 'Enterprise-grade security',

        // Features
        'features_title' => 'It replaces your dashboard.',
        'features_desc' => 'Don\'t buy expensive software you won\'t use. Do it all in the chat.',
        'f_company' => 'Team Roster', 'f_company_desc' => 'Add or remove employees instantly. See who is in which department.',
        'f_employees' => 'Tasks & Deadlines', 'f_employees_desc' => 'Assign tasks via text. We nag your team about deadlines so you don\'t have to.',
        'f_positions' => 'Client Database', 'f_positions_desc' => 'Pull up client details, history, and active deals without leaving the chat.',
        'f_departments' => 'Permissions', 'f_departments_desc' => 'Lock down sensitive data. Control exactly who sees what and when.',
        'f_access' => 'File Generator', 'f_access_desc' => 'Create images, edit documents, and analyze links on the fly.',
        'f_reminders' => 'Document Search', 'f_reminders_desc' => 'Find that one contract from last year by asking. We search inside the files.',

        'about_title' => 'Why ' . $appName . '?',
        'about_p1' => 'Traditional software is cluttered. You spend more time managing the tool than doing the work. ' . $appName . ' strips that away.',
        'about_p2' => 'We treat your company like a conversation. You tell us what to do, and it gets done. No menus, no loading screens, no "I forgot my password." It\'s just work, simplified.',

        // Steps
        'how_title' => 'It takes seconds.',
        'how_desc' => 'Text your commands like you\'re talking to an assistant.',

        'how_step_1' => 'Team Roster', 'how_step_1_desc' => '“Add John (john@example.com) to the team.”',
        'how_step_2' => 'Tasks & Deadlines', 'how_step_2_desc' => '“Task for John: Finish the report by Friday.”',
        'how_step_3' => 'Client Database', 'how_step_3_desc' => '“Show me the contact info for Client X.”',
        'how_step_4' => 'Permissions', 'how_step_4_desc' => '“Block access to the team after 6 PM.”',
        'how_step_5' => 'Document Search', 'how_step_5_desc' => '“Find all invoice files uploaded by members in last March.”',

        'contact_title' => 'Get Started', 'contact_desc' => 'Ready to simplify? Send us a message.',
        'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL,
        'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL,
        'contact_location' => 'Europe, Estonia',
        'label_name' => 'Name', 'placeholder_name' => 'John Smith',
        'label_email' => 'Work Email', 'placeholder_email' => 'john@company.com',
        'label_message' => 'Message', 'placeholder_message' => 'I want to integrate this with...',
        'btn_submit' => 'Send Message',

        'err_name_required' => 'Name is missing.', 'err_name_length' => 'Name too short/long.',
        'err_email_required' => 'Email is missing.', 'err_email_length' => 'Email invalid.',
        'err_message_required' => 'Message is missing.', 'err_message_length' => 'Message invalid.',
        'err_rate_limit' => 'Too fast. Wait a moment.',
        'err_captcha' => 'Security check failed.',
        'success_received' => 'Received. We will reply shortly.',
        'failure_received' => 'Error sending message.',
        'submission_problem' => 'Please fix errors:',
        'ft_terms' => 'Terms', 'ft_privacy' => 'Privacy', 'ft_registry' => 'Registry',
        'ft_doc_text' => 'Text Docs', 'ft_doc_visual' => 'Visual Docs', 'ft_pricing' => 'Pricing',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram',
        'modal_captcha_title' => 'Security', 'modal_captcha_close' => 'Close',
    ],

    'greek' => [
        'brand' => $appName,
        'nav_home' => 'Αρχική', 'nav_features' => 'Εργαλεία', 'nav_usecases' => 'Επίδειξη', 'nav_contact' => 'Επικοινωνία',
        'cta_request' => 'Ξεκινήστε', 'cta_explore' => 'Λειτουργία', 'label_dark' => 'Σκοτεινή',
        'h1' => 'Το γραφείο σας, τώρα σε chat.',
        'lead' => 'Διαχειριστείτε την ομάδα και τις πωλήσεις σας απευθείας από το WhatsApp ή το Telegram.',
        'pill_1_title' => 'Παντού', 'pill_1_desc' => 'WhatsApp, Telegram, Email',
        'pill_2_title' => 'Χωρίς Εκπαίδευση', 'pill_2_desc' => 'Απλά στείλτε μήνυμα',
        'pill_3_title' => 'Ιδιωτικό', 'pill_3_desc' => 'Ασφάλεια δεδομένων',
        'features_title' => 'Αντικαθιστά το dashboard σας.',
        'features_desc' => 'Κάντε τη δουλειά σας μέσα από τη συνομιλία.',
        'f_company' => 'Ομάδα', 'f_company_desc' => 'Προσθέστε ή αφαιρέστε υπαλλήλους άμεσα.',
        'f_employees' => 'Εργασίες & Προθεσμίες', 'f_employees_desc' => 'Αναθέστε εργασίες με μήνυμα. Εμείς υπενθυμίζουμε τις προθεσμίες.',
        'f_positions' => 'Πελατολόγιο', 'f_positions_desc' => 'Βρείτε στοιχεία πελατών χωρίς να βγείτε από το chat.',
        'f_departments' => 'Δικαιώματα', 'f_departments_desc' => 'Ελέγξτε ποιος βλέπει τι και πότε.',
        'f_access' => 'Αρχεία', 'f_access_desc' => 'Δημιουργήστε εικόνες και έγγραφα άμεσα.',
        'f_reminders' => 'Αναζήτηση Εγγράφων', 'f_reminders_desc' => 'Βρείτε παλιά συμβόλαια ψάχνοντας το περιεχόμενο τους.',
        'about_title' => 'Γιατί ' . $appName . ';',
        'about_p1' => 'Το κλασικό λογισμικό είναι αργό. Το ' . $appName . ' είναι γρήγορο σαν μήνυμα.',
        'about_p2' => 'Δώστε εντολή και εκτελείται.',
        'how_title' => 'Παίρνει δευτερόλεπτα.',
        'how_desc' => 'Γράψτε εντολές όπως μιλάτε σε έναν βοηθό.',

        'how_step_1' => 'Ομάδα', 'how_step_1_desc' => '«Πρόσθεσε τον Γιάννη (john@example.com) στην ομάδα.»',
        'how_step_2' => 'Εργασίες & Προθεσμίες', 'how_step_2_desc' => '«Εργασία για Γιάννη: Τελείωσε την αναφορά ως την Παρασκευή.»',
        'how_step_3' => 'Πελατολόγιο', 'how_step_3_desc' => '«Δείξε μου τα στοιχεία του Πελάτη Χ.»',
        'how_step_4' => 'Δικαιώματα', 'how_step_4_desc' => '«Κλείδωσε την πρόσβαση στην ομάδα μετά τις 6μμ.»',
        'how_step_5' => 'Αναζήτηση Εγγράφων', 'how_step_5_desc' => '«Βρες όλα τα τιμολόγια που ανέβασαν μέλη τον Μάρτιο.»',

        'contact_title' => 'Επικοινωνία', 'contact_desc' => 'Έτοιμοι για απλοποίηση; Στείλτε μας μήνυμα.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Ευρώπη, Αθήνα', 'label_name' => 'Όνομα', 'placeholder_name' => 'Γιάννης Παπαδόπουλος', 'label_email' => 'Email', 'placeholder_email' => 'john@company.com', 'label_message' => 'Μήνυμα', 'placeholder_message' => 'Θέλω να ρωτήσω...', 'btn_submit' => 'Αποστολή',
        'err_name_required' => 'Λείπει το όνομα.', 'err_name_length' => 'Μη έγκυρο όνομα.', 'err_email_required' => 'Λείπει το email.', 'err_email_length' => 'Μη έγκυρο email.', 'err_message_required' => 'Λείπει το μήνυμα.', 'err_message_length' => 'Μη έγκυρο μήνυμα.', 'err_rate_limit' => 'Πολύ γρήγορα.', 'err_captcha' => 'Αποτυχία ασφαλείας.', 'success_received' => 'Λήφθηκε. Θα απαντήσουμε σύντομα.', 'failure_received' => 'Σφάλμα αποστολής.', 'submission_problem' => 'Διορθώστε τα σφάλματα:', 'ft_terms' => 'Όροι', 'ft_privacy' => 'Απόρρητο', 'ft_registry' => 'Μητρώο',
        'ft_doc_text' => 'Text Docs', 'ft_doc_visual' => 'Visual Docs', 'ft_pricing' => 'Τιμολόγηση',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Ασφάλεια', 'modal_captcha_close' => 'Κλείσιμο',
    ],

    'dutch' => [
        'brand' => $appName,
        'nav_home' => 'Home', 'nav_features' => 'Tools', 'nav_usecases' => 'Demonstratie', 'nav_contact' => 'Contact',
        'cta_request' => 'Start Nu', 'cta_explore' => 'Hoe werkt het', 'label_dark' => 'Donker',
        'h1' => 'Uw kantoor is nu een chatroom.',
        'lead' => 'Beheer uw team, verkoop en taken direct in WhatsApp of Telegram.',
        'pill_1_title' => 'Overal', 'pill_1_desc' => 'WhatsApp, Telegram, Email', 'pill_2_title' => 'Geen Training', 'pill_2_desc' => 'Zo simpel als sms\'en', 'pill_3_title' => 'Privé', 'pill_3_desc' => 'Veilige data',
        'features_title' => 'Vervangt uw dashboard.', 'features_desc' => 'Doe al het werk in de chat.',
        'f_company' => 'Teamlijst', 'f_company_desc' => 'Voeg medewerkers direct toe of verwijder ze.',
        'f_employees' => 'Taken & Deadlines', 'f_employees_desc' => 'Wijs taken toe via tekst. Wij herinneren uw team aan deadlines.',
        'f_positions' => 'Klanten', 'f_positions_desc' => 'Bekijk klantgegevens zonder de chat te verlaten.',
        'f_departments' => 'Rechten', 'f_departments_desc' => 'Beheer wie wat ziet en wanneer.',
        'f_access' => 'Bestanden', 'f_access_desc' => 'Maak afbeeldingen en documenten direct aan.',
        'f_reminders' => 'Documenten Zoeken', 'f_reminders_desc' => 'Vind contracten door in de inhoud te zoeken.',
        'about_title' => 'Waarom ' . $appName . '?', 'about_p1' => 'Traditionele software is traag. ' . $appName . ' is snel en direct.', 'about_p2' => 'Geen menu\'s, gewoon werk.',
        'how_title' => 'Het duurt seconden.', 'how_desc' => 'Typ commando\'s alsof u met een assistent praat.',

        'how_step_1' => 'Teamlijst', 'how_step_1_desc' => '“Voeg Jan (jan@example.com) toe aan het team.”',
        'how_step_2' => 'Taken & Deadlines', 'how_step_2_desc' => '“Taak voor Jan: Rapport afmaken voor vrijdag.”',
        'how_step_3' => 'Klanten', 'how_step_3_desc' => '“Toon contactinfo voor Klant X.”',
        'how_step_4' => 'Rechten', 'how_step_4_desc' => '“Blokkeer toegang tot het team na 18:00.”',
        'how_step_5' => 'Documenten Zoeken', 'how_step_5_desc' => '“Vind alle facturen geüpload door leden in maart.”',

        'contact_title' => 'Starten', 'contact_desc' => 'Klaar om te versimpelen? Stuur een bericht.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estland', 'label_name' => 'Naam', 'placeholder_name' => 'Jan Jansen', 'label_email' => 'Werk Email', 'placeholder_email' => 'jan@bedrijf.nl', 'label_message' => 'Bericht', 'placeholder_message' => 'Ik wil integreren met...', 'btn_submit' => 'Verstuur',
        'err_name_required' => 'Naam ontbreekt.', 'err_name_length' => 'Naam ongeldig.', 'err_email_required' => 'Email ontbreekt.', 'err_email_length' => 'Email ongeldig.', 'err_message_required' => 'Bericht ontbreekt.', 'err_message_length' => 'Bericht ongeldig.', 'err_rate_limit' => 'Te snel.', 'err_captcha' => 'Beveiliging faalt.', 'success_received' => 'Ontvangen.', 'failure_received' => 'Fout bij verzenden.', 'submission_problem' => 'Los problemen op:', 'ft_terms' => 'Voorwaarden', 'ft_privacy' => 'Privacy', 'ft_registry' => 'Register',
        'ft_doc_text' => 'Tekst Docs', 'ft_doc_visual' => 'Visuele Docs', 'ft_pricing' => 'Prijzen',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Beveiliging', 'modal_captcha_close' => 'Sluiten',
    ],

    'german' => [
        'brand' => $appName,
        'nav_home' => 'Start', 'nav_features' => 'Tools', 'nav_usecases' => 'Demo', 'nav_contact' => 'Kontakt',
        'cta_request' => 'Loslegen', 'cta_explore' => 'Funktion', 'label_dark' => 'Dunkel',
        'h1' => 'Ihr Büro ist jetzt ein Chat.', 'lead' => 'Verwalten Sie Teams, Verkäufe und Aufgaben direkt in WhatsApp oder Telegram.',
        'pill_1_title' => 'Überall', 'pill_1_desc' => 'WhatsApp, Telegram, E-Mail', 'pill_2_title' => 'Kein Training', 'pill_2_desc' => 'Einfach wie SMS', 'pill_3_title' => 'Privat', 'pill_3_desc' => 'Sichere Daten',
        'features_title' => 'Ersetzt Ihr Dashboard.', 'features_desc' => 'Erledigen Sie alles im Chat.',
        'f_company' => 'Teamliste', 'f_company_desc' => 'Mitarbeiter sofort hinzufügen oder entfernen.',
        'f_employees' => 'Aufgaben & Fristen', 'f_employees_desc' => 'Aufgaben per Text zuweisen. Wir erinnern Ihr Team an Fristen.',
        'f_positions' => 'Kundendatenbank', 'f_positions_desc' => 'Kundendetails abrufen, ohne den Chat zu verlassen.',
        'f_departments' => 'Berechtigungen', 'f_departments_desc' => 'Steuern Sie genau, wer was sieht.',
        'f_access' => 'Dateien', 'f_access_desc' => 'Erstellen Sie Bilder und Dokumente sofort.',
        'f_reminders' => 'Dokumentensuche', 'f_reminders_desc' => 'Finden Sie Verträge, indem Sie den Inhalt durchsuchen.',
        'about_title' => 'Warum ' . $appName . '?', 'about_p1' => 'Klassische Software ist langsam. ' . $appName . ' ist schnell und direkt.', 'about_p2' => 'Befehl eingeben, erledigt.',
        'how_title' => 'Dauert Sekunden.', 'how_desc' => 'Schreiben Sie Befehle wie an einen Assistenten.',

        'how_step_1' => 'Teamliste', 'how_step_1_desc' => '„Füge Max (max@example.com) zum Team hinzu.“',
        'how_step_2' => 'Aufgaben & Fristen', 'how_step_2_desc' => '„Aufgabe für Max: Bericht bis Freitag fertigstellen.“',
        'how_step_3' => 'Kundendatenbank', 'how_step_3_desc' => '„Zeige Kontaktinfos für Kunde X.“',
        'how_step_4' => 'Berechtigungen', 'how_step_4_desc' => '„Sperre Zugriff auf das Team nach 18:00.“',
        'how_step_5' => 'Dokumentensuche', 'how_step_5_desc' => '„Finde alle Rechnungen, die im März hochgeladen wurden.“',

        'contact_title' => 'Starten', 'contact_desc' => 'Bereit? Schreiben Sie uns.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estland', 'label_name' => 'Name', 'placeholder_name' => 'Max Mustermann', 'label_email' => 'E-Mail', 'placeholder_email' => 'max@firma.de', 'label_message' => 'Nachricht', 'placeholder_message' => 'Ich möchte starten...', 'btn_submit' => 'Senden',
        'err_name_required' => 'Name fehlt.', 'err_name_length' => 'Name ungültig.', 'err_email_required' => 'E-Mail fehlt.', 'err_email_length' => 'Ungültig.', 'err_message_required' => 'Nachricht fehlt.', 'err_message_length' => 'Ungültig.', 'err_rate_limit' => 'Zu schnell.', 'err_captcha' => 'Fehler.', 'success_received' => 'Empfangen.', 'failure_received' => 'Fehler.', 'submission_problem' => 'Bitte korrigieren:', 'ft_terms' => 'AGB', 'ft_privacy' => 'Datenschutz', 'ft_registry' => 'Register',
        'ft_doc_text' => 'Text Docs', 'ft_doc_visual' => 'Visuelle Docs', 'ft_pricing' => 'Preise',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Sicherheit', 'modal_captcha_close' => 'Schließen',
    ],

    'italian' => [
        'brand' => $appName,
        'nav_home' => 'Home', 'nav_features' => 'Strumenti', 'nav_usecases' => 'Demo', 'nav_contact' => 'Contatti',
        'cta_request' => 'Inizia', 'cta_explore' => 'Come funziona', 'label_dark' => 'Scuro',
        'h1' => 'Il tuo ufficio ora è una chat.', 'lead' => 'Gestisci team, vendite e compiti direttamente su WhatsApp o Telegram.',
        'pill_1_title' => 'Ovunque', 'pill_1_desc' => 'WhatsApp, Telegram, Email', 'pill_2_title' => 'Zero Training', 'pill_2_desc' => 'Facile come un SMS', 'pill_3_title' => 'Privato', 'pill_3_desc' => 'Dati sicuri',
        'features_title' => 'Sostituisce la dashboard.', 'features_desc' => 'Fai tutto via chat.',
        'f_company' => 'Team', 'f_company_desc' => 'Aggiungi o rimuovi dipendenti all\'istante.',
        'f_employees' => 'Compiti & Scadenze', 'f_employees_desc' => 'Assegna compiti via testo. Noi ricordiamo le scadenze.',
        'f_positions' => 'Clienti', 'f_positions_desc' => 'Vedi dettagli clienti senza uscire dalla chat.',
        'f_departments' => 'Permessi', 'f_departments_desc' => 'Controlla chi vede cosa e quando.',
        'f_access' => 'File', 'f_access_desc' => 'Crea immagini e documenti al volo.',
        'f_reminders' => 'Ricerca Documenti', 'f_reminders_desc' => 'Trova contratti cercando nel contenuto.',
        'about_title' => 'Perché ' . $appName . '?', 'about_p1' => 'Software classico è lento. ' . $appName . ' è immediato.', 'about_p2' => 'Dai un comando ed è fatto.',
        'how_title' => 'Ci vogliono secondi.', 'how_desc' => 'Scrivi comandi come se parlassi a un assistente.',

        'how_step_1' => 'Team', 'how_step_1_desc' => '“Aggiungi Luca (luca@example.com) al team.”',
        'how_step_2' => 'Compiti & Scadenze', 'how_step_2_desc' => '“Compito per Luca: Finire il report entro venerdì.”',
        'how_step_3' => 'Clienti', 'how_step_3_desc' => '“Mostra info contatto per Cliente X.”',
        'how_step_4' => 'Permessi', 'how_step_4_desc' => '“Blocca accesso al team dopo le 18:00.”',
        'how_step_5' => 'Ricerca Documenti', 'how_step_5_desc' => '“Trova tutte le fatture caricate dai membri a marzo.”',

        'contact_title' => 'Inizia', 'contact_desc' => 'Pronto a semplificare? Scrivici.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estonia', 'label_name' => 'Nome', 'placeholder_name' => 'Mario Rossi', 'label_email' => 'Email', 'placeholder_email' => 'mario@azienda.it', 'label_message' => 'Messaggio', 'placeholder_message' => 'Voglio iniziare...', 'btn_submit' => 'Invia', 'err_name_required' => 'Manca nome.', 'err_name_length' => 'Non valido.', 'err_email_required' => 'Manca email.', 'err_email_length' => 'Non valida.', 'err_message_required' => 'Manca messaggio.', 'err_message_length' => 'Non valido.', 'err_rate_limit' => 'Troppo veloce.', 'err_captcha' => 'Errore.', 'success_received' => 'Ricevuto.', 'failure_received' => 'Errore.', 'submission_problem' => 'Correggi:', 'ft_terms' => 'Termini', 'ft_privacy' => 'Privacy', 'ft_registry' => 'Registro',
        'ft_doc_text' => 'Doc Testuali', 'ft_doc_visual' => 'Doc Visivi', 'ft_pricing' => 'Prezzi',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Sicurezza', 'modal_captcha_close' => 'Chiudi',
    ],

    'french' => [
        'brand' => $appName,
        'nav_home' => 'Accueil', 'nav_features' => 'Outils', 'nav_usecases' => 'Démo', 'nav_contact' => 'Contact',
        'cta_request' => 'Démarrer', 'cta_explore' => 'Fonctionnement', 'label_dark' => 'Sombre',
        'h1' => 'Votre bureau est un chat.', 'lead' => 'Gérez votre équipe et vos tâches directement dans WhatsApp ou Telegram.',
        'pill_1_title' => 'Partout', 'pill_1_desc' => 'WhatsApp, Telegram, Email', 'pill_2_title' => 'Zéro Formation', 'pill_2_desc' => 'Aussi simple qu\'un SMS', 'pill_3_title' => 'Privé', 'pill_3_desc' => 'Données sécurisées',
        'features_title' => 'Remplace votre dashboard.', 'features_desc' => 'Faites tout le travail dans le chat.',
        'f_company' => 'Équipe', 'f_company_desc' => 'Ajoutez ou supprimez des employés instantanément.',
        'f_employees' => 'Tâches & Délais', 'f_employees_desc' => 'Assignez des tâches par texto. Nous rappelons les délais.',
        'f_positions' => 'Clients', 'f_positions_desc' => 'Consultez les infos clients sans quitter le chat.',
        'f_departments' => 'Permissions', 'f_departments_desc' => 'Contrôlez qui voit quoi et quand.',
        'f_access' => 'Fichiers', 'f_access_desc' => 'Créez images et documents à la volée.',
        'f_reminders' => 'Recherche Documents', 'f_reminders_desc' => 'Trouvez des contrats en cherchant dans le contenu.',
        'about_title' => 'Pourquoi ' . $appName . ' ?', 'about_p1' => 'Logiciel classique est lent. ' . $appName . ' est immédiat.', 'about_p2' => 'Donnez un ordre, c\'est fait.',
        'how_title' => 'Ça prend des secondes.', 'how_desc' => 'Écrivez vos commandes comme à un assistant.',

        'how_step_1' => 'Équipe', 'how_step_1_desc' => '« Ajoute Jean (jean@example.com) à l\'équipe. »',
        'how_step_2' => 'Tâches & Délais', 'how_step_2_desc' => '« Tâche pour Jean : Finir le rapport pour vendredi. »',
        'how_step_3' => 'Clients', 'how_step_3_desc' => '« Montre-moi les infos du Client X. »',
        'how_step_4' => 'Permissions', 'how_step_4_desc' => '« Bloque accès à l\'équipe après 18h. »',
        'how_step_5' => 'Recherche Documents', 'how_step_5_desc' => '« Trouve toutes les factures chargées par les membres en mars. »',

        'contact_title' => 'Démarrer', 'contact_desc' => 'Prêt à simplifier ? Écrivez-nous.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europe, Estonie', 'label_name' => 'Nom', 'placeholder_name' => 'Jean Dupont', 'label_email' => 'Email', 'placeholder_email' => 'jean@societe.com', 'label_message' => 'Message', 'placeholder_message' => 'Je veux intégrer...', 'btn_submit' => 'Envoyer', 'err_name_required' => 'Nom manquant.', 'err_name_length' => 'Invalide.', 'err_email_required' => 'Email manquant.', 'err_email_length' => 'Invalide.', 'err_message_required' => 'Message manquant.', 'err_message_length' => 'Invalide.', 'err_rate_limit' => 'Trop rapide.', 'err_captcha' => 'Erreur.', 'success_received' => 'Reçu.', 'failure_received' => 'Erreur.', 'submission_problem' => 'Erreurs :', 'ft_terms' => 'Conditions', 'ft_privacy' => 'Confidentialité', 'ft_registry' => 'Registre',
        'ft_doc_text' => 'Docs Texte', 'ft_doc_visual' => 'Docs Visuels', 'ft_pricing' => 'Tarifs',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Sécurité', 'modal_captcha_close' => 'Fermer',
    ],

    'portuguese' => [
        'brand' => $appName,
        'nav_home' => 'Início', 'nav_features' => 'Ferramentas', 'nav_usecases' => 'Demo', 'nav_contact' => 'Contato',
        'cta_request' => 'Começar', 'cta_explore' => 'Como funciona', 'label_dark' => 'Escuro',
        'h1' => 'Seu escritório agora é um chat.', 'lead' => 'Gerencie equipe e tarefas direto no WhatsApp ou Telegram.',
        'pill_1_title' => 'Em todo lugar', 'pill_1_desc' => 'WhatsApp, Telegram, Email', 'pill_2_title' => 'Zero Treino', 'pill_2_desc' => 'Simples como SMS', 'pill_3_title' => 'Privado', 'pill_3_desc' => 'Dados seguros',
        'features_title' => 'Substitui seu painel.', 'features_desc' => 'Faça tudo pelo chat.',
        'f_company' => 'Equipe', 'f_company_desc' => 'Adicione ou remova funcionários instantaneamente.',
        'f_employees' => 'Tarefas & Prazos', 'f_employees_desc' => 'Designe tarefas por texto. Nós cobramos os prazos.',
        'f_positions' => 'Clientes', 'f_positions_desc' => 'Veja dados de clientes sem sair do chat.',
        'f_departments' => 'Permissões', 'f_departments_desc' => 'Controle quem vê o que e quando.',
        'f_access' => 'Arquivos', 'f_access_desc' => 'Crie imagens e documentos na hora.',
        'f_reminders' => 'Busca Documentos', 'f_reminders_desc' => 'Encontre contratos buscando pelo conteúdo.',
        'about_title' => 'Por que ' . $appName . '?', 'about_p1' => 'Software tradicional é lento. ' . $appName . ' é imediato.', 'about_p2' => 'Dê o comando, e está feito.',
        'how_title' => 'Leva segundos.', 'how_desc' => 'Escreva comandos como se falasse com um assistente.',

        'how_step_1' => 'Equipe', 'how_step_1_desc' => '“Adicione João (joao@example.com) à equipe.”',
        'how_step_2' => 'Tarefas & Prazos', 'how_step_2_desc' => '“Tarefa para João: Terminar o relatório até sexta.”',
        'how_step_3' => 'Clientes', 'how_step_3_desc' => '“Mostre-me os dados do Cliente X.”',
        'how_step_4' => 'Permissões', 'how_step_4_desc' => '“Bloqueie acesso à equipe após as 18h.”',
        'how_step_5' => 'Busca Documentos', 'how_step_5_desc' => '“Encontre todas as faturas enviadas por membros em março.”',

        'contact_title' => 'Começar', 'contact_desc' => 'Pronto para simplificar? Envie mensagem.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estônia', 'label_name' => 'Nome', 'placeholder_name' => 'João Silva', 'label_email' => 'Email', 'placeholder_email' => 'joao@empresa.com', 'label_message' => 'Mensagem', 'placeholder_message' => 'Quero começar...', 'btn_submit' => 'Enviar', 'err_name_required' => 'Falta nome.', 'err_name_length' => 'Inválido.', 'err_email_required' => 'Falta email.', 'err_email_length' => 'Inválido.', 'err_message_required' => 'Falta mensagem.', 'err_message_length' => 'Inválido.', 'err_rate_limit' => 'Muito rápido.', 'err_captcha' => 'Erro.', 'success_received' => 'Recebido.', 'failure_received' => 'Erro.', 'submission_problem' => 'Erros:', 'ft_terms' => 'Termos', 'ft_privacy' => 'Privacidade', 'ft_registry' => 'Registro',
        'ft_doc_text' => 'Docs Texto', 'ft_doc_visual' => 'Docs Visuais', 'ft_pricing' => 'Preços',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Segurança', 'modal_captcha_close' => 'Fechar',
    ],

    'spanish' => [
        'brand' => $appName,
        'nav_home' => 'Inicio', 'nav_features' => 'Herramientas', 'nav_usecases' => 'Demo', 'nav_contact' => 'Contacto',
        'cta_request' => 'Empezar', 'cta_explore' => 'Cómo funciona', 'label_dark' => 'Oscuro',
        'h1' => 'Su oficina ahora es un chat.', 'lead' => 'Gestione su equipo y tareas directo en WhatsApp o Telegram.',
        'pill_1_title' => 'En todas partes', 'pill_1_desc' => 'WhatsApp, Telegram, Email', 'pill_2_title' => 'Cero Formación', 'pill_2_desc' => 'Tan simple como SMS', 'pill_3_title' => 'Privado', 'pill_3_desc' => 'Datos seguros',
        'features_title' => 'Reemplaza su panel.', 'features_desc' => 'Haga todo el trabajo en el chat.',
        'f_company' => 'Equipo', 'f_company_desc' => 'Añada o elimine empleados al instante.',
        'f_employees' => 'Tareas y Plazos', 'f_employees_desc' => 'Asigne tareas por texto. Recordamos los plazos.',
        'f_positions' => 'Clientes', 'f_positions_desc' => 'Vea datos de clientes sin salir del chat.',
        'f_departments' => 'Permisos', 'f_departments_desc' => 'Controle quién ve qué y cuándo.',
        'f_access' => 'Archivos', 'f_access_desc' => 'Cree imágenes y documentos al vuelo.',
        'f_reminders' => 'Búsqueda Documentos', 'f_reminders_desc' => 'Encuentre contratos buscando en el contenido.',
        'about_title' => '¿Por qué ' . $appName . '?', 'about_p1' => 'El software clásico es lento. ' . $appName . ' es inmediato.', 'about_p2' => 'Dé una orden y listo.',
        'how_title' => 'Toma segundos.', 'how_desc' => 'Escriba comandos como si hablara con un asistente.',

        'how_step_1' => 'Equipo', 'how_step_1_desc' => '“Añada a Juan (juan@example.com) al equipo.”',
        'how_step_2' => 'Tareas y Plazos', 'how_step_2_desc' => '“Tarea para Juan: Terminar el informe para el viernes.”',
        'how_step_3' => 'Clientes', 'how_step_3_desc' => '“Muestre la info de contacto del Cliente X.”',
        'how_step_4' => 'Permisos', 'how_step_4_desc' => '“Bloquee acceso al equipo tras las 18:00.”',
        'how_step_5' => 'Búsqueda Documentos', 'how_step_5_desc' => '“Encuentre todas las facturas subidas por miembros en marzo.”',

        'contact_title' => 'Empezar', 'contact_desc' => '¿Listo para simplificar? Escríbanos.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estonia', 'label_name' => 'Nombre', 'placeholder_name' => 'Juan Pérez', 'label_email' => 'Email', 'placeholder_email' => 'juan@empresa.com', 'label_message' => 'Mensaje', 'placeholder_message' => 'Quiero empezar...', 'btn_submit' => 'Enviar', 'err_name_required' => 'Falta nombre.', 'err_name_length' => 'Inválido.', 'err_email_required' => 'Falta email.', 'err_email_length' => 'Inválido.', 'err_message_required' => 'Falta mensaje.', 'err_message_length' => 'Inválido.', 'err_rate_limit' => 'Muy rápido.', 'err_captcha' => 'Fallo.', 'success_received' => 'Recibido.', 'failure_received' => 'Error.', 'submission_problem' => 'Corrija:', 'ft_terms' => 'Términos', 'ft_privacy' => 'Privacidad', 'ft_registry' => 'Registro',
        'ft_doc_text' => 'Docs Texto', 'ft_doc_visual' => 'Docs Visuales', 'ft_pricing' => 'Precios',
        'ft_instagram' => 'Instagram', 'ft_messenger' => 'Messenger', 'ft_whatsapp' => 'WhatsApp', 'ft_discord' => 'Discord', 'ft_telegram' => 'Telegram', 'modal_captcha_title' => 'Seguridad', 'modal_captcha_close' => 'Cerrar',
    ],
];

// Fallback logic
$languages = ['english', 'greek', 'dutch', 'german', 'italian', 'french', 'portuguese', 'spanish'];
foreach ($languages as $l) {
    if (!isset($translations[$l])) $translations[$l] = $translations['english'];
}

// Language Logic
if (!isset($lang)) {
    $lang = get_form_get('language', 'english');
}
if (!in_array($lang, $languages, true)) {
    $lang = 'english';
}
$langCodes = ['english' => 'en', 'greek' => 'el', 'dutch' => 'nl', 'german' => 'de', 'italian' => 'it', 'french' => 'fr', 'portuguese' => 'pt', 'spanish' => 'es'];
$t = $translations[$lang];

// Form Handling
$errors = [];
$name = '';
$email = '';
$message = '';
$form_status = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $user_ip = get_client_ip_address();
    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, stream_context_create([
        'http' => ['header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => http_build_query(['secret' => $recaptcha_secret_key, 'response' => $_POST['g-recaptcha-response'] ?? '', 'remoteip' => $user_ip])]
    ]));
    if (!json_decode($verify)->success) $errors[] = $t['err_captcha'];

    $name = trim((string)get_form_post('name', ''));
    $email = strtolower(trim((string)get_form_post('email', '')));
    $message = trim((string)get_form_post('message', ''));

    if (strlen($name) < 2) $errors[] = $t['err_name_required'];
    if (!is_email($email)) $errors[] = $t['err_email_required'];
    if (strlen($message) < 10) $errors[] = $t['err_message_required'];

    if (empty($errors)) {
        require_once '/var/www/.structure/library/memory/init.php';
        require_once '/var/www/.structure/library/email/init.php';
        $memKey = "idealistic_form_" . $user_ip;
        if (has_memory_cooldown($memKey, 60)) {
            $errors[] = $t['err_rate_limit'];
        } else {
            $services_email = services_self_email($email, 'Idealistic Office Inquiry', "Name: $name\nEmail: $email\nMsg: $message");
            $form_status = $services_email === true;
        }
    }
}
?>
<!doctype html>
<html lang="<?php echo $langCodes[$lang]; ?>" data-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title><?php echo IdealisticOfficeVariable::COMPANY_NAME ?></title>
    <meta name="description" content="Manage your company via WhatsApp & Telegram. No menus, just chat.">
    <link href="https://www.idealistic.ai/.design/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* Modern Theme Variables */
        :root {
            --bg: #f8f9fa;
            --surface: #ffffff;
            --text: #212529;
            --text-muted: #6c757d;
            --border-color: rgba(0, 0, 0, 0.08);
            --input-bg: #f8f9fa;
        }

        html[data-theme='dark'] {
            --bg: #0f172a;
            --surface: #1e293b;
            --text: #f1f5f9;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.08);
            --input-bg: #0f172a;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            transition: background .3s;
        }

        .bg-card {
            background-color: var(--surface) !important;
        }

        .bg-section {
            background-color: var(--bg) !important;
        }

        .text-body {
            color: var(--text) !important;
        }

        .text-secondary-theme {
            color: var(--text-muted) !important;
        }

        .hero {
            min-height: 75vh;
            display: flex;
            align-items: center;
        }

        .feature-card {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
            transition: transform .2s;
        }

        html[data-theme='dark'] .feature-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0d6efd;
        }

        .timeline-item {
            border-left: 2px solid #0d6efd;
            padding-left: 1.5rem;
            padding-bottom: 2rem;
            position: relative;
        }

        .timeline-bullet {
            width: 12px;
            height: 12px;
            background: #0d6efd;
            border-radius: 50%;
            position: absolute;
            left: -7px;
            top: 5px;
        }

        .timeline-container, form {
            border: 1px solid var(--border-color) !important;
        }

        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }

        .reveal.in-view {
            opacity: 1;
            transform: none;
        }

        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand, .nav-link {
            color: var(--text) !important;
        }

        footer {
            background: var(--surface);
            padding: 3rem 0;
            margin-top: 4rem;
            border-top: 1px solid var(--border-color);
        }

        footer a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color .2s;
        }

        footer a:hover {
            color: var(--text);
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: var(--text);
        }

        .form-control:focus {
            background-color: var(--input-bg);
            color: var(--text);
            border-color: #0d6efd;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
            opacity: 0.7;
        }

        .modal-content {
            background-color: var(--surface);
            color: var(--text);
            border: 1px solid var(--border-color);
        }

        .btn-close {
            filter: var(--theme-filter, none);
        }

        html[data-theme='dark'] .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
            <img src="https://www.idealistic.ai/.images/logoCircular.png" width="32" height="32" alt="Logo">
            <span><?php echo htmlspecialchars($t['brand']); ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon" style="filter: invert(var(--invert-icon, 0))"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="#features"><?php echo $t['nav_features']; ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#usecases"><?php echo $t['nav_usecases']; ?></a></li>
                <li class="nav-item ms-3"><a class="btn btn-primary btn-sm rounded-pill px-3"
                                             href="#contact"><?php echo $t['cta_request']; ?></a></li>

                <li class="nav-item ms-3">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-secondary-theme" href="#" role="button"
                           data-bs-toggle="dropdown">
                            <span class="me-1"><?php echo $flags[$lang]; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php foreach ($langCodes as $langName => $code): ?>
                                <li><a class="dropdown-item"
                                       href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY . '/' . $code . '/'; ?>">
                                        <span class="me-2"><?php echo $flags[$langName]; ?></span>
                                    </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>

                <li class="nav-item ms-3 d-flex align-items-center">
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" role="switch" id="themeToggle"
                               style="cursor: pointer;">
                        <label class="form-check-label ms-1" for="themeToggle">
                            <i class="bi bi-sun-fill" id="themeIcon"></i>
                        </label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 reveal">
                <h1 class="display-4 fw-bold mb-3"><?php echo $t['h1']; ?></h1>
                <p class="lead text-secondary-theme mb-4"><?php echo $t['lead']; ?></p>
                <div class="d-flex gap-2">
                    <a href="#contact" class="btn btn-primary btn-lg rounded-pill"><?php echo $t['cta_request']; ?></a>
                    <a href="#features"
                       class="btn btn-outline-secondary btn-lg rounded-pill"><?php echo $t['cta_explore']; ?></a>
                </div>
                <div class="mt-4 d-flex gap-4 text-secondary-theme small">
                    <span><i class="bi bi-check-circle me-1"></i> <?php echo $t['pill_1_title']; ?></span>
                    <span><i class="bi bi-check-circle me-1"></i> <?php echo $t['pill_2_title']; ?></span>
                    <span><i class="bi bi-check-circle me-1"></i> <?php echo $t['pill_3_title']; ?></span>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block reveal text-center">
                <img id="heroMockup" src="https://www.idealistic.ai/.images/logoTransparent.png" class="img-fluid"
                     alt="App Preview" style="transition: opacity 0.3s ease;">
            </div>
        </div>
    </div>
</header>

<section id="features">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h2 class="fw-bold"><?php echo $t['features_title']; ?></h2>
            <p class="text-secondary-theme"><?php echo $t['features_desc']; ?></p>
        </div>
        <div class="row g-4">
            <?php
            $feats = ['company', 'employees', 'positions', 'departments', 'access', 'reminders'];
            $icons = ['building', 'people', 'person-check', 'shield-lock', 'pencil-square', 'search'];
            foreach ($feats as $k => $f): ?>
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="feature-card">
                        <i class="bi bi-<?php echo $icons[$k]; ?> feature-icon"></i>
                        <h4 class="fw-bold"><?php echo $t['f_' . $f]; ?></h4>
                        <p class="text-secondary-theme mb-0"><?php echo $t['f_' . $f . '_desc']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5 bg-section reveal">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3"><?php echo $t['about_title']; ?></h2>
                <p class="text-secondary-theme"><?php echo $t['about_p1']; ?></p>
                <p class="text-secondary-theme"><?php echo $t['about_p2']; ?></p>
            </div>
            <div class="col-lg-5 offset-lg-1">

            </div>
        </div>
    </div>
</section>

<section id="usecases">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h2 class="fw-bold"><?php echo $t['how_title']; ?></h2>
            <p class="text-secondary-theme"><?php echo $t['how_desc']; ?></p>
        </div>
        <div class="row justify-content-center reveal">
            <div class="col-lg-8">
                <div class="bg-card p-4 rounded-4 shadow-sm timeline-container">
                    <?php
                    $steps = ['step_1', 'step_2', 'step_3', 'step_4', 'step_5'];
                    foreach ($steps as $s): ?>
                        <div class="timeline-item">
                            <div class="timeline-bullet"></div>
                            <h5 class="fw-bold mb-1"><?php echo $t['how_' . $s]; ?></h5>
                            <code class="text-primary bg-section px-2 py-1 rounded d-block mt-1"><?php echo $t['how_' . $s . '_desc']; ?></code>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-6 text-center mb-4 reveal">
                <h2 class="fw-bold"><?php echo $t['contact_title']; ?></h2>
                <p class="text-secondary-theme"><?php echo $t['contact_desc']; ?></p>
            </div>
        </div>
        <div class="row justify-content-center reveal">
            <div class="col-lg-5">
                <?php if ($errors): ?>
                    <div class="alert alert-danger"><?php echo implode('<br>', $errors); ?></div><?php endif; ?>
                <?php if ($form_status === true): ?>
                    <div class="alert alert-success"><?php echo $t['success_received']; ?></div><?php endif; ?>

                <form method="post" id="contactForm" class="bg-card p-4 rounded-4 shadow-sm">
                    <input type="hidden" name="contact_form" value="1">
                    <div class="mb-3">
                        <label class="form-label small text-uppercase fw-bold text-secondary-theme"><?php echo $t['label_name']; ?></label>
                        <input name="name" class="form-control" placeholder="<?php echo $t['placeholder_name']; ?>"
                               value="<?php echo htmlspecialchars($name); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-uppercase fw-bold text-secondary-theme"><?php echo $t['label_email']; ?></label>
                        <input name="email" type="email" class="form-control"
                               placeholder="<?php echo $t['placeholder_email']; ?>"
                               value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-uppercase fw-bold text-secondary-theme"><?php echo $t['label_message']; ?></label>
                        <textarea name="message" rows="3" class="form-control"
                                  placeholder="<?php echo $t['placeholder_message']; ?>"><?php echo htmlspecialchars($message); ?></textarea>
                    </div>
                    <button class="btn btn-primary w-100 py-2 rounded-pill fw-bold"><?php echo $t['btn_submit']; ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3 py-2">
            <img src="https://www.idealistic.ai/.images/logoCircular.png" alt="logo" height="32">
            <small class="text-secondary-theme">© 2026 <?php echo IdealisticOfficeVariable::COMPANY_NAME ?></small>
        </div>

        <div class="py-2 d-flex align-items-center gap-3 flex-wrap">
            <a class="d-flex align-items-center gap-2"
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/terms/terms_of_use/"
               target="_blank"><i class="bi bi-journal-text"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_terms']; ?></span></a>
            <a class="d-flex align-items-center gap-2"
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/policies/privacy_policy/"
               target="_blank"><i class="bi bi-shield-lock"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_privacy']; ?></span></a>
            <a class="d-flex align-items-center gap-2"
               href="https://ariregister.rik.ee/eng/company/17320016/Idealistic-OÜ"
               target="_blank"><i class="bi bi-building-check"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_registry']; ?></span></a>

            <a class="d-flex align-items-center gap-2"
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/documentation/text"
               target="_blank"><i class="bi bi-file-earmark-text"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_doc_text']; ?></span></a>
            <a class="d-flex align-items-center gap-2"
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/documentation/visual"
               target="_blank"><i class="bi bi-images"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_doc_visual']; ?></span></a>
            <a class="d-flex align-items-center gap-2"
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/pricing"
               target="_blank"><i class="bi bi-tag"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_pricing']; ?></span></a>
            <a class="d-flex align-items-center gap-2" href="https://www.instagram.com/idealistic.ai" target="_blank"><i
                        class="bi bi-instagram"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_instagram']; ?></span></a>
            <a class="d-flex align-items-center gap-2" href="https://www.facebook.com/idealisticai" target="_blank"><i
                        class="bi bi-messenger"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_messenger']; ?></span></a>
            <a class="d-flex align-items-center gap-2" href="https://wa.me/message/YA5Z4B5YULQZA1" target="_blank"><i
                        class="bi bi-whatsapp"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_whatsapp']; ?></span></a>
            <a class="d-flex align-items-center gap-2" href="https://discord.com/invite/kmFJWcRtSP" target="_blank"><i
                        class="bi bi-discord"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_discord']; ?></span></a>
            <a class="d-flex align-items-center gap-2" href="https://t.me/idealisticBot" target="_blank"><i
                        class="bi bi-telegram"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_telegram']; ?></span></a>
        </div>
    </div>
</footer>

<div class="modal fade" id="captchaModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <h5 class="mb-3"><?php echo $t['modal_captcha_title']; ?></h5>
                <div class="g-recaptcha d-inline-block" data-sitekey="<?php echo $recaptcha_site_key; ?>"
                     data-callback="captchaSolved"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.idealistic.ai/.scripts/bootstrap.bundle.min.js"></script>
<script>
    // Theme Toggling Logic
    const toggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const root = document.documentElement;
    const heroImg = document.getElementById('heroMockup');

    // Image sources
    const lightMock = 'https://www.idealistic.ai/.images/logoTransparent.png';
    const darkMock = 'https://www.idealistic.ai/.images/backgroundLogoTransparent.png';

    function setTheme(theme) {
        root.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);

        // Update Icon
        if (themeIcon) {
            themeIcon.className = theme === 'dark' ? 'bi bi-moon-fill text-white' : 'bi bi-sun-fill text-warning';
        }

        // Update Navbar Toggler
        const toggler = document.querySelector('.navbar-toggler-icon');
        if (toggler) toggler.style.filter = theme === 'dark' ? 'invert(1)' : 'invert(0)';

        // Swap Hero Logo
        if (heroImg) {
            heroImg.style.opacity = 0;
            setTimeout(() => {
                heroImg.src = theme === 'dark' ? darkMock : lightMock;
                heroImg.style.opacity = 1;
            }, 300);
        }
    }

    // Init
    if (localStorage.getItem('theme') === 'dark') {
        toggle.checked = true;
        setTheme('dark');
    } else {
        setTheme('light');
    }

    toggle.addEventListener('change', () => {
        setTheme(toggle.checked ? 'dark' : 'light');
    });

    // Reveal Animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => e.isIntersecting && e.target.classList.add('in-view'));
    }, {threshold: 0.1});
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Captcha Logic
    function captchaSolved(token) {
        const f = document.getElementById('contactForm');
        const i = document.createElement('input');
        i.type = 'hidden';
        i.name = 'g-recaptcha-response';
        i.value = token;
        f.appendChild(i);
        f.submit();
    }

    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();
        new bootstrap.Modal(document.getElementById('captchaModal')).show();
    });
</script>
</body>
</html>