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
        'lead' => 'Built for modern professionals—from law firms and clinics to real estate and agencies. Manage your team and tasks directly inside Instagram, Messenger, WhatsApp, Discord, Telegram, or Email, while supporting your clients through custom web chatrooms.',

        'pill_1_title' => 'Works Everywhere', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Zero Training', 'pill_2_desc' => 'If you can text, you can use it',
        'pill_3_title' => 'Private', 'pill_3_desc' => 'Enterprise-grade security',

        // Features
        'features_title' => 'It replaces your dashboard.',
        'features_desc' => 'Don\'t buy expensive software you won\'t use. Do it all in the chat.',

        'f_1' => 'Portals', 'f_1_desc' => 'Deploy secure web chatrooms via unique URLs for your clients. Give every client or project a dedicated room that pulls info from your internal topics to provide instant, personalized assistance.',
        'f_2' => 'File/Webpage Search', 'f_2_desc' => 'Find contracts, medical records, or blueprints in seconds. Search through uploaded files and URLs using natural language and tags.',
        'f_3' => 'File/Webpage Analysis', 'f_3_desc' => 'Drop a heavy legal brief, financial report, or webpage link, and let AI analyze, summarize, and extract key data for you instantly.',
        'f_4' => 'Topics', 'f_4_desc' => 'Organize the chaos. Group client cases, properties, or patient files into dedicated spaces for focused teamwork.',
        'f_5' => 'Instructions', 'f_5_desc' => 'Standardize your service. Assign strict, customizable guidelines for specific roles (e.g., Reception, Agents)—ensuring perfect handling every time.',
        'f_6' => 'Reminders / Deadlines', 'f_6_desc' => 'Never miss a court date, tax deadline, or viewing. Set automated nudges for your team, specific roles, or individual members.',
        'f_7' => 'Announcements', 'f_7_desc' => 'Broadcast critical updates—like tax law changes or clinic hours—instantly to the whole team or specific people.',
        'f_8' => 'Shortcuts', 'f_8_desc' => 'Type less, say more. Expand short abbreviations into full, professional responses to save time and stay consistent.',
        'f_9' => 'Roles / Managers', 'f_9_desc' => 'Build a healthy team structure. Group members easily and define clear management tiers.',
        'f_10' => 'Access Window', 'f_10_desc' => 'Control who works when. Lock down team access down to the specific day, hour, and minute.',
        'f_11' => 'Weekly Schedule', 'f_11_desc' => 'Keep everyone aligned. Set and manage flexible weekly routines per team, role, or member.',
        'f_12' => 'Polls', 'f_12_desc' => 'Make decisions faster. Create instant polls and let your team vote directly in the chat.',
        'f_13' => 'File Generator', 'f_13_desc' => 'Create on the fly. Generate, store, and edit documents or images securely from your chat prompts.',
        'f_14' => 'Plans', 'f_14_desc' => 'Turn data into strategy. Let AI analyze your info and generate actionable plans to hit specific goals.',
        'f_15' => 'Website Panel', 'f_15_desc' => 'See the big picture. Temporarily switch to a visual dashboard to review team data in a broader view.',

        'about_title' => 'Why ' . $appName . '?',
        'about_p1' => 'Traditional software is cluttered. You spend more time managing the tool than doing the actual professional work. ' . $appName . ' strips that away.',
        'about_p2' => 'We treat your company like a conversation. You tell us what to do, and it gets done. No menus, no loading screens, no "I forgot my password." It\'s just work, simplified.',

        // Steps (Typing Animation Data)
        'how_title' => 'It takes seconds.',
        'how_desc' => 'Text your commands like you\'re talking to an assistant.',

        'how_step_1' => 'Portals',
        'how_step_1_cmd' => '“Create a client portal for Smith LLC and link it to the \'Tax Audit 2025\' topic.”',
        'how_step_1_reply' => '> Portal \'Smith LLC\' successfully created and linked. URL generated.',

        'how_step_2' => 'File/Webpage Search',
        'how_step_2_cmd' => '“Find the NDA contract we sent to the Johnson client last March.”',
        'how_step_2_reply' => '> Search complete. Found 2 files matching \'NDA\' for client \'Johnson\'.',

        'how_step_3' => 'File/Webpage Analysis',
        'how_step_3_cmd' => '“Analyze this lease agreement link and summarize the termination clauses.”',
        'how_step_3_reply' => '> Analysis complete. Extracted 3 key termination clauses.',

        'how_step_4' => 'Topics',
        'how_step_4_cmd' => '“Create topic \'Villa Project\' and add the engineering team.”',
        'how_step_4_reply' => '> Topic \'Villa Project\' initialized with 5 members added.',

        'how_step_5' => 'Instructions',
        'how_step_5_cmd' => '“Add instruction for Reception: Always ask for the patient\'s ID.”',
        'how_step_5_reply' => '> Instruction successfully added to \'Reception\' role guidelines.',

        'how_step_6' => 'Reminders / Deadlines',
        'how_step_6_cmd' => '“Remind the accounting team about the Q3 VAT deadline next Tuesday.”',
        'how_step_6_reply' => '> Reminder \'Q3 VAT deadline\' scheduled for the \'accounting\' role.',

        'how_step_7' => 'Announcements',
        'how_step_7_cmd' => '“Announce to the team: The notary is arriving today at 2 PM.”',
        'how_step_7_reply' => '> Announcement successfully sent to 12 team members.',

        'how_step_8' => 'Shortcuts',
        'how_step_8_cmd' => '“Create shortcut \'brb\' for \'Be right back, in a client meeting.\'”',
        'how_step_8_reply' => '> Shortcut \'brb\' successfully saved.',

        'how_step_9' => 'Roles / Managers',
        'how_step_9_cmd' => '“Create role \'Agents\' and make Alex the manager.”',
        'how_step_9_reply' => '> Role \'Agents\' created. \'Alex\' assigned as manager.',

        // New Sections
        'platforms_title' => 'Choose your platform',
        'platforms_desc' => 'Start managing your team from your favorite app.',

        'pricing_title' => 'Pricing Calculator',
        'pricing_desc' => 'Adjust the slider to estimate your monthly cost.',
        'pricing_msgs' => 'Msgs',
        'pricing_member_msgs' => 'Member Messages',
        'pricing_or' => 'or',
        'pricing_customer_msgs' => 'Customer Messages',
        'pricing_plan' => 'Plan',
        'pricing_estimated' => 'Estimated Price',
        'pricing_billed' => 'Billed monthly',
        'pricing_per_month' => '/month',
        'pricing_per_msg' => '/ member msg',
        'pricing_vat' => '* All prices include VAT.',
        'pricing_disclaimer' => '* Members are internal team users, while Customers are external users interacting through shopping chats. Both share a single message pool, but they are weighted differently due to processing requirements: 1 Member message is equivalent to 10 Customer messages.',

        'contact_title' => 'Contact Us', 'contact_desc' => 'Ready to simplify? Send us a message.',
        'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL,
        'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL,
        'contact_location' => 'Europe, Estonia',
        'label_name' => 'Name', 'placeholder_name' => 'John Smith',
        'label_email' => 'Work Email', 'placeholder_email' => 'contact@idealistic.ai',
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
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Examples', 'ft_pricing' => 'Pricing',
        'modal_captcha_title' => 'Security', 'modal_captcha_close' => 'Close',
    ],

    'greek' => [
        'brand' => $appName,
        'nav_home' => 'Αρχική', 'nav_features' => 'Εργαλεία', 'nav_usecases' => 'Επίδειξη', 'nav_contact' => 'Επικοινωνία',
        'cta_request' => 'Ξεκινήστε', 'cta_explore' => 'Λειτουργία', 'label_dark' => 'Σκοτεινή',
        'h1' => 'Το γραφείο σας, τώρα σε chat.',
        'lead' => 'Σχεδιασμένο για επαγγελματίες—δικηγόρους, λογιστές, μεσίτες και κλινικές. Διαχειριστείτε την ομάδα και τις εργασίες σας απευθείας από το Instagram, Messenger, WhatsApp, Discord, Telegram ή Email, ενώ εξυπηρετείτε τους πελάτες σας μέσω προσαρμοσμένων web chatrooms.',
        'pill_1_title' => 'Παντού', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Χωρίς Εκπαίδευση', 'pill_2_desc' => 'Απλά στείλτε μήνυμα',
        'pill_3_title' => 'Ιδιωτικό', 'pill_3_desc' => 'Ασφάλεια δεδομένων',
        'features_title' => 'Αντικαθιστά το dashboard σας.',
        'features_desc' => 'Κάντε τη δουλειά σας μέσα από τη συνομιλία.',

        'f_1' => 'Πύλες', 'f_1_desc' => 'Δημιουργήστε ασφαλή web chatrooms για τους πελάτες σας μέσω μοναδικών URL. Συνδέστε τα με εσωτερικά θέματα για απόλυτα προσαρμοσμένη και άμεση εξυπηρέτηση.',
        'f_2' => 'Αναζήτηση Αρχείων/Web', 'f_2_desc' => 'Βρείτε συμβόλαια, φορολογικά αρχεία ή σχέδια σε δευτερόλεπτα με φυσική γλώσσα.',
        'f_3' => 'Ανάλυση Αρχείων/Web', 'f_3_desc' => 'Αφήστε το AI να αναλύσει και να συνοψίσει βαριά νομικά έγγραφα, οικονομικές αναφορές ή links.',
        'f_4' => 'Θέματα', 'f_4_desc' => 'Οργανώστε υποθέσεις πελατών, ακίνητα ή ιατρικούς φακέλους σε ειδικούς χώρους συνεργασίας.',
        'f_5' => 'Οδηγίες', 'f_5_desc' => 'Τυποποιήστε την εξυπηρέτησή σας. Ορίστε αυστηρούς κανόνες για συγκεκριμένους ρόλους (π.χ. Υποδοχή).',
        'f_6' => 'Υπενθυμίσεις / Προθεσμίες', 'f_6_desc' => 'Μην χάσετε ποτέ δικάσιμο ή φορολογική προθεσμία. Ορίστε αυτοματοποιημένες ειδοποιήσεις.',
        'f_7' => 'Ανακοινώσεις', 'f_7_desc' => 'Στείλτε άμεσα κρίσιμες ενημερώσεις σε όλη την ομάδα ή σε συγκεκριμένα άτομα.',
        'f_8' => 'Συντομεύσεις', 'f_8_desc' => 'Πληκτρολογήστε λιγότερα. Επεκτείνετε μικρές φράσεις σε ολόκληρες επαγγελματικές απαντήσεις.',
        'f_9' => 'Ρόλοι & Managers', 'f_9_desc' => 'Οργανώστε την ομάδα σας και ορίστε ξεκάθαρα επίπεδα διαχείρισης.',
        'f_10' => 'Πρόσβαση', 'f_10_desc' => 'Ελέγξτε ακριβώς ποια μέρα και ώρα έχει πρόσβαση η ομάδα σας.',
        'f_11' => 'Πρόγραμμα', 'f_11_desc' => 'Ορίστε εβδομαδιαία προγράμματα για την ομάδα ή συγκεκριμένα μέλη.',
        'f_12' => 'Δημοσκοπήσεις', 'f_12_desc' => 'Λάβετε αποφάσεις γρήγορα δημιουργώντας ψηφοφορίες στο chat.',
        'f_13' => 'Δημιουργία Αρχείων', 'f_13_desc' => 'Δημιουργήστε έγγραφα και εικόνες επιτόπου μέσω του chat.',
        'f_14' => 'Σχέδια', 'f_14_desc' => 'Μετατρέψτε τα δεδομένα σε στρατηγική με πλάνα που δημιουργεί το AI.',
        'f_15' => 'Website Panel', 'f_15_desc' => 'Δείτε τη μεγάλη εικόνα μέσα από τον οπτικό πίνακα ελέγχου.',

        'about_title' => 'Γιατί ' . $appName . ';',
        'about_p1' => 'Το κλασικό λογισμικό είναι αργό. Το ' . $appName . ' είναι γρήγορο σαν μήνυμα.',
        'about_p2' => 'Δώστε εντολή και εκτελείται.',
        'how_title' => 'Παίρνει δευτερόλεπτα.',
        'how_desc' => 'Γράψτε εντολές όπως μιλάτε σε έναν βοηθό.',

        'how_step_1' => 'Πύλες',
        'how_step_1_cmd' => '«Φτιάξε πύλη για την Smith LLC και σύνδεσέ το με το θέμα \'Φορολογικός Έλεγχος\'.»',
        'how_step_1_reply' => '> Η Πύλη \'Smith LLC\' δημιουργήθηκε. Το URL δημιουργήθηκε επιτυχώς.',
        'how_step_2' => 'Αναζήτηση Αρχείων/Web',
        'how_step_2_cmd' => '«Βρες το NDA που στείλαμε στον πελάτη Johnson τον Μάρτιο.»',
        'how_step_2_reply' => '> Βρέθηκαν 2 αρχεία που ταιριάζουν στο \'NDA\' για τον πελάτη \'Johnson\'.',
        'how_step_3' => 'Ανάλυση Αρχείων/Web',
        'how_step_3_cmd' => '«Ανέλυσε αυτό το μισθωτήριο και σύνοψισε τους όρους λήξης.»',
        'how_step_3_reply' => '> Η ανάλυση ολοκληρώθηκε. Εξήχθησαν 3 βασικοί όροι.',
        'how_step_4' => 'Θέματα',
        'how_step_4_cmd' => '«Φτιάξε θέμα \'Project Βίλας\' και πρόσθεσε τους μηχανικούς.»',
        'how_step_4_reply' => '> Το θέμα \'Project Βίλας\' δημιουργήθηκε με 5 μέλη.',
        'how_step_5' => 'Οδηγίες',
        'how_step_5_cmd' => '«Πρόσθεσε οδηγία στην Υποδοχή: Πάντα να ζητάτε ταυτότητα.»',
        'how_step_5_reply' => '> Η οδηγία προστέθηκε επιτυχώς στον ρόλο \'Υποδοχή\'.',
        'how_step_6' => 'Υπενθυμίσεις / Προθεσμίες',
        'how_step_6_cmd' => '«Υπενθύμισε στο λογιστήριο το deadline του ΦΠΑ την Τρίτη.»',
        'how_step_6_reply' => '> Η υπενθύμιση \'ΦΠΑ\' προγραμματίστηκε για τον ρόλο \'λογιστήριο\'.',
        'how_step_7' => 'Ανακοινώσεις',
        'how_step_7_cmd' => '«Ανακοίνωση: Ο συμβολαιογράφος έρχεται σήμερα στις 2 μ.μ.»',
        'how_step_7_reply' => '> Η ανακοίνωση στάλθηκε επιτυχώς σε 12 μέλη.',
        'how_step_8' => 'Συντομεύσεις',
        'how_step_8_cmd' => '«Φτιάξε συντόμευση \'καλημ\' για \'Καλημέρα, πώς μπορώ να βοηθήσω;\'»',
        'how_step_8_reply' => '> Η συντόμευση \'καλημ\' αποθηκεύτηκε.',
        'how_step_9' => 'Ρόλοι & Managers',
        'how_step_9_cmd' => '«Φτιάξε ρόλο Μεσιτών και βάλε manager τον Νίκο.»',
        'how_step_9_reply' => '> Ο ρόλος δημιουργήθηκε. Ο \'Νίκος\' ορίστηκε manager.',

        'platforms_title' => 'Επιλέξτε πλατφόρμα',
        'platforms_desc' => 'Διαχειριστείτε την ομάδα σας από την αγαπημένη σας εφαρμογή.',

        'pricing_title' => 'Υπολογισμός Κόστους',
        'pricing_desc' => 'Προσαρμόστε για να δείτε το μηνιαίο κόστος.',
        'pricing_msgs' => 'Μηνύματα',
        'pricing_member_msgs' => 'Μηνύματα Μελών',
        'pricing_or' => 'ή',
        'pricing_customer_msgs' => 'Μηνύματα Πελατών',
        'pricing_plan' => 'Πλάνο',
        'pricing_estimated' => 'Εκτιμώμενη Τιμή',
        'pricing_billed' => 'Μηνιαία χρέωση',
        'pricing_per_month' => '/μήνα',
        'pricing_per_msg' => '/ μήνυμα μέλους',
        'pricing_vat' => '* Οι τιμές περιλαμβάνουν ΦΠΑ.',
        'pricing_disclaimer' => '* Τα Μέλη είναι εσωτερικοί χρήστες της ομάδας, ενώ οι Πελάτες είναι εξωτερικοί χρήστες που αλληλεπιδρούν μέσω αγορών. Και οι δύο μοιράζονται την ίδια δεξαμενή μηνυμάτων, αλλά ζυγίζονται διαφορετικά: 1 μήνυμα Μέλους ισούται με 10 μηνύματα Πελατών.',

        'contact_title' => 'Επικοινωνία', 'contact_desc' => 'Έτοιμοι για απλοποίηση; Στείλτε μας μήνυμα.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Ευρώπη, Αθήνα', 'label_name' => 'Όνομα', 'placeholder_name' => 'Γιάννης Παπαδόπουλος', 'label_email' => 'Email', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Μήνυμα', 'placeholder_message' => 'Θέλω να ρωτήσω...', 'btn_submit' => 'Αποστολή',
        'err_name_required' => 'Λείπει το όνομα.', 'err_name_length' => 'Μη έγκυρο όνομα.', 'err_email_required' => 'Λείπει το email.', 'err_email_length' => 'Μη έγκυρο email.', 'err_message_required' => 'Λείπει το μήνυμα.', 'err_message_length' => 'Μη έγκυρο μήνυμα.', 'err_rate_limit' => 'Πολύ γρήγορα.', 'err_captcha' => 'Αποτυχία ασφαλείας.', 'success_received' => 'Λήφθηκε. Θα απαντήσουμε σύντομα.', 'failure_received' => 'Σφάλμα αποστολής.', 'submission_problem' => 'Διορθώστε τα σφάλματα:', 'ft_terms' => 'Όροι', 'ft_privacy' => 'Απόρρητο', 'ft_registry' => 'Μητρώο',
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Παραδείγματα', 'ft_pricing' => 'Τιμολόγηση',
        'modal_captcha_title' => 'Ασφάλεια', 'modal_captcha_close' => 'Κλείσιμο',
    ],

    'dutch' => [
        'brand' => $appName,
        'nav_home' => 'Home', 'nav_features' => 'Tools', 'nav_usecases' => 'Demonstratie', 'nav_contact' => 'Contact',
        'cta_request' => 'Start Nu', 'cta_explore' => 'Hoe werkt het', 'label_dark' => 'Donker',
        'h1' => 'Uw kantoor is nu een chatroom.',
        'lead' => 'Gebouwd voor professionals—advocaten, accountants, makelaars en klinieken. Beheer uw team en taken direct vanuit Instagram, Messenger, WhatsApp, Discord, Telegram of Email, terwijl u klanten ondersteunt via aangepaste web chatrooms.',
        'pill_1_title' => 'Overal', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Geen Training', 'pill_2_desc' => 'Zo simpel als sms\'en', 'pill_3_title' => 'Privé', 'pill_3_desc' => 'Veilige data',
        'features_title' => 'Vervangt uw dashboard.', 'features_desc' => 'Doe al het werk in de chat.',

        'f_1' => 'Portalen', 'f_1_desc' => 'Zet veilige web chatrooms in via unieke URL\'s voor uw klanten. Koppel ze aan interne onderwerpen voor snelle, gepersonaliseerde ondersteuning.',
        'f_2' => 'Bestand/Webpagina Zoeken', 'f_2_desc' => 'Vind contracten, belastingdossiers of bouwtekeningen in seconden met natuurlijke taal.',
        'f_3' => 'Bestand/Webpagina Analyse', 'f_3_desc' => 'Laat AI zware juridische documenten, financiële rapporten of links voor u analyseren en samenvatten.',
        'f_4' => 'Onderwerpen', 'f_4_desc' => 'Groepeer klantcases, woningen of patiëntendossiers in speciale ruimtes voor gerichte samenwerking.',
        'f_5' => 'Instructies', 'f_5_desc' => 'Standaardiseer uw service. Wijs strikte richtlijnen toe aan specifieke rollen (bijv. Receptie).',
        'f_6' => 'Herinneringen / Deadlines', 'f_6_desc' => 'Mis nooit een rechtszaak of belastingdeadline. Stel automatische waarschuwingen in.',
        'f_7' => 'Aankondigingen', 'f_7_desc' => 'Stuur direct belangrijke updates naar het hele team of specifieke personen.',
        'f_8' => 'Snelkoppelingen', 'f_8_desc' => 'Typ minder, zeg meer. Breid korte zinnen uit tot volledige professionele reacties.',
        'f_9' => 'Rollen & Managers', 'f_9_desc' => 'Bouw een gezonde teamstructuur. Groepeer leden eenvoudig met duidelijke beheerniveaus.',
        'f_10' => 'Toegangsvenster', 'f_10_desc' => 'Beheer de toegang tot op de dag en minuut nauwkeurig.',
        'f_11' => 'Weekrooster', 'f_11_desc' => 'Stel flexibele wekelijkse routines in per team of lid.',
        'f_12' => 'Peilingen', 'f_12_desc' => 'Maak sneller beslissingen met directe peilingen in de chat.',
        'f_13' => 'Bestandsgenerator', 'f_13_desc' => 'Genereer en bewerk documenten direct via chatopdrachten.',
        'f_14' => 'Plannen', 'f_14_desc' => 'Laat AI actieplannen genereren om uw doelen te bereiken.',
        'f_15' => 'Websitepaneel', 'f_15_desc' => 'Schakel over naar een visueel dashboard voor een breder overzicht.',

        'about_title' => 'Waarom ' . $appName . '?', 'about_p1' => 'Traditionele software is traag. ' . $appName . ' is snel en direct.', 'about_p2' => 'Geen menu\'s, gewoon werk.',
        'how_title' => 'Het duurt seconden.', 'how_desc' => 'Typ commando\'s alsof u met een assistent praat.',

        'how_step_1' => 'Portalen',
        'how_step_1_cmd' => '“Maak een portaal voor Smith LLC gelinkt aan topic \'Tax 2025\'.”',
        'how_step_1_reply' => '> Portaal \'Smith LLC\' succesvol aangemaakt. URL gegenereerd.',
        'how_step_2' => 'Bestand/Webpagina Zoeken',
        'how_step_2_cmd' => '“Vind het NDA contract voor klant Johnson van afgelopen maart.”',
        'how_step_2_reply' => '> Zoekopdracht voltooid. 2 bestanden gevonden voor \'NDA\'.',
        'how_step_3' => 'Bestand/Webpagina Analyse',
        'how_step_3_cmd' => '“Analyseer dit huurcontract en vat de opzeggingsclausules samen.”',
        'how_step_3_reply' => '> Analyse voltooid. 3 clausules geëxtraheerd.',
        'how_step_4' => 'Onderwerpen',
        'how_step_4_cmd' => '“Maak onderwerp \'Villa Project\' voor de ingenieurs.”',
        'how_step_4_reply' => '> Onderwerp aangemaakt met 5 leden.',
        'how_step_5' => 'Instructies',
        'how_step_5_cmd' => '“Instructie Receptie: Vraag altijd naar het ID.”',
        'how_step_5_reply' => '> Instructie toegevoegd aan de \'Receptie\' rol.',
        'how_step_6' => 'Herinneringen / Deadlines',
        'how_step_6_cmd' => '“Herinner administratie aan de BTW deadline dinsdag.”',
        'how_step_6_reply' => '> Herinnering ingepland voor de \'administratie\' rol.',
        'how_step_7' => 'Aankondigingen',
        'how_step_7_cmd' => '“Aankondiging: De notaris komt vandaag om 14:00.”',
        'how_step_7_reply' => '> Aankondiging verzonden naar 12 leden.',
        'how_step_8' => 'Snelkoppelingen',
        'how_step_8_cmd' => '“Maak snelkoppeling \'mvg\' voor \'Met vriendelijke groet\'”',
        'how_step_8_reply' => '> Snelkoppeling \'mvg\' opgeslagen.',
        'how_step_9' => 'Rollen & Managers',
        'how_step_9_cmd' => '“Maak rol Makelaars met Alex als manager.”',
        'how_step_9_reply' => '> Rol aangemaakt. \'Alex\' is nu manager.',

        'platforms_title' => 'Kies uw platform',
        'platforms_desc' => 'Beheer uw team vanuit uw favoriete app.',

        'pricing_title' => 'Prijscalculator',
        'pricing_desc' => 'Pas de schuifregelaar aan om uw kosten te schatten.',
        'pricing_msgs' => 'Berichten',
        'pricing_member_msgs' => 'Ledenberichten',
        'pricing_or' => 'of',
        'pricing_customer_msgs' => 'Klantberichten',
        'pricing_plan' => 'Plan',
        'pricing_estimated' => 'Geschatte Prijs',
        'pricing_billed' => 'Maandelijks gefactureerd',
        'pricing_per_month' => '/maand',
        'pricing_per_msg' => '/ ledenbericht',
        'pricing_vat' => '* Alle prijzen zijn inclusief BTW.',
        'pricing_disclaimer' => '* Leden zijn interne teamgebruikers, terwijl Klanten externe gebruikers zijn. Ze delen één berichtenpool, maar worden anders gewogen: 1 Ledenbericht is gelijk aan 10 Klantberichten.',

        'contact_title' => 'Contact Us', 'contact_desc' => 'Klaar om te versimpelen? Stuur een bericht.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estland', 'label_name' => 'Naam', 'placeholder_name' => 'Jan Jansen', 'label_email' => 'Werk Email', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Bericht', 'placeholder_message' => 'Ik wil integreren met...', 'btn_submit' => 'Verstuur',
        'err_name_required' => 'Naam ontbreekt.', 'err_name_length' => 'Naam ongeldig.', 'err_email_required' => 'Email ontbreekt.', 'err_email_length' => 'Email ongeldig.', 'err_message_required' => 'Bericht ontbreekt.', 'err_message_length' => 'Bericht ongeldig.', 'err_rate_limit' => 'Te snel.', 'err_captcha' => 'Beveiliging faalt.', 'success_received' => 'Ontvangen.', 'failure_received' => 'Fout bij verzenden.', 'submission_problem' => 'Los problemen op:', 'ft_terms' => 'Voorwaarden', 'ft_privacy' => 'Privacy', 'ft_registry' => 'Register',
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Voorbeelden', 'ft_pricing' => 'Prijzen',
        'modal_captcha_title' => 'Beveiliging', 'modal_captcha_close' => 'Sluiten',
    ],

    'german' => [
        'brand' => $appName,
        'nav_home' => 'Start', 'nav_features' => 'Tools', 'nav_usecases' => 'Demo', 'nav_contact' => 'Kontakt',
        'cta_request' => 'Loslegen', 'cta_explore' => 'Funktion', 'label_dark' => 'Dunkel',
        'h1' => 'Ihr Büro ist jetzt ein Chat.',
        'lead' => 'Entwickelt für Profis – Anwälte, Steuerberater, Makler und Kliniken. Verwalten Sie Ihr Team und Aufgaben direkt über Instagram, Messenger, WhatsApp, Discord, Telegram oder E-Mail, während Sie Kunden über maßgeschneiderte Web-Chatrooms betreuen.',
        'pill_1_title' => 'Überall', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, E-Mail',
        'pill_2_title' => 'Kein Training', 'pill_2_desc' => 'Einfach wie SMS', 'pill_3_title' => 'Privat', 'pill_3_desc' => 'Sichere Daten',
        'features_title' => 'Ersetzt Ihr Dashboard.', 'features_desc' => 'Erledigen Sie alles im Chat.',

        'f_1' => 'Portale', 'f_1_desc' => 'Stellen Sie sichere Web-Chatrooms über einzigartige URLs für Ihre Kunden bereit. Verknüpfen Sie diese mit internen Themen für personalisierten Support.',
        'f_2' => 'Datei-/Webseiten-Suche', 'f_2_desc' => 'Finden Sie Verträge, Steuerunterlagen oder Baupläne in Sekundenschnelle mit natürlicher Sprache.',
        'f_3' => 'Datei-/Webseiten-Analyse', 'f_3_desc' => 'Lassen Sie KI umfangreiche Rechtsdokumente, Finanzberichte oder Links für Sie analysieren und zusammenfassen.',
        'f_4' => 'Themen', 'f_4_desc' => 'Gruppieren Sie Kundenfälle, Immobilien oder Patientenakten in dedizierten Arbeitsbereichen.',
        'f_5' => 'Anweisungen', 'f_5_desc' => 'Standardisieren Sie Ihren Service. Legen Sie strenge, anpassbare Richtlinien für bestimmte Rollen fest.',
        'f_6' => 'Erinnerungen / Fristen', 'f_6_desc' => 'Verpassen Sie nie wieder einen Gerichtstermin oder eine Steuerfrist. Richten Sie automatische Erinnerungen ein.',
        'f_7' => 'Ankündigungen', 'f_7_desc' => 'Senden Sie wichtige Updates sofort an das gesamte Team oder bestimmte Personen.',
        'f_8' => 'Shortcuts', 'f_8_desc' => 'Tippen Sie weniger. Erweitern Sie kurze Phrasen zu vollständigen professionellen Texten.',
        'f_9' => 'Rollen / Manager', 'f_9_desc' => 'Gruppieren Sie Mitglieder einfach und definieren Sie klare Management-Ebenen.',
        'f_10' => 'Zugriffsfenster', 'f_10_desc' => 'Sperren Sie den Zugriff auf den Chat auf die Minute genau.',
        'f_11' => 'Zeitplan', 'f_11_desc' => 'Legen Sie wöchentliche Routinen für Teams oder einzelne Mitglieder fest.',
        'f_12' => 'Umfragen', 'f_12_desc' => 'Treffen Sie Entscheidungen schneller mit Live-Umfragen im Chat.',
        'f_13' => 'Dateigenerator', 'f_13_desc' => 'Erstellen und bearbeiten Sie Dokumente direkt über Chat-Befehle.',
        'f_14' => 'Pläne', 'f_14_desc' => 'Lassen Sie KI aus Ihren Daten umsetzbare Pläne generieren.',
        'f_15' => 'Web-Panel', 'f_15_desc' => 'Wechseln Sie für einen breiteren Überblick zu einem visuellen Dashboard.',

        'about_title' => 'Warum ' . $appName . '?', 'about_p1' => 'Klassische Software ist langsam. ' . $appName . ' ist schnell und direkt.', 'about_p2' => 'Befehl eingeben, erledigt.',
        'how_title' => 'Dauert Sekunden.', 'how_desc' => 'Schreiben Sie Befehle wie an einen Assistenten.',

        'how_step_1' => 'Portale',
        'how_step_1_cmd' => '„Erstelle Portal für Smith LLC, verknüpft mit Thema \'Steuern 2025\'.“',
        'how_step_1_reply' => '> Portal \'Smith LLC\' erfolgreich erstellt. URL generiert.',
        'how_step_2' => 'Datei-/Webseiten-Suche',
        'how_step_2_cmd' => '„Finde den NDA-Vertrag für Kunde Johnson vom letzten März.“',
        'how_step_2_reply' => '> Suche abgeschlossen. 2 Dateien für \'NDA\' gefunden.',
        'how_step_3' => 'Datei-/Webseiten-Analyse',
        'how_step_3_cmd' => '„Analysiere diesen Mietvertrag und fasse die Kündigungsklauseln zusammen.“',
        'how_step_3_reply' => '> Analyse abgeschlossen. 3 Klauseln extrahiert.',
        'how_step_4' => 'Themen',
        'how_step_4_cmd' => '„Thema \'Villa Projekt\' für Ingenieure erstellen.“',
        'how_step_4_reply' => '> Thema mit 5 Mitgliedern erstellt.',
        'how_step_5' => 'Anweisungen',
        'how_step_5_cmd' => '„Anweisung Empfang: Immer nach dem Ausweis fragen.“',
        'how_step_5_reply' => '> Anweisung zur Rolle \'Empfang\' hinzugefügt.',
        'how_step_6' => 'Erinnerungen / Fristen',
        'how_step_6_cmd' => '„Erinnere die Buchhaltung an die MwSt-Frist am Dienstag.“',
        'how_step_6_reply' => '> Erinnerung für die Rolle \'Buchhaltung\' geplant.',
        'how_step_7' => 'Ankündigungen',
        'how_step_7_cmd' => '„Ankündigung: Der Notar kommt heute um 14 Uhr.“',
        'how_step_7_reply' => '> Ankündigung an 12 Mitglieder gesendet.',
        'how_step_8' => 'Shortcuts',
        'how_step_8_cmd' => '„Shortcut \'mfg\' für \'Mit freundlichen Grüßen\' erstellen.“',
        'how_step_8_reply' => '> Shortcut \'mfg\' gespeichert.',
        'how_step_9' => 'Rollen / Manager',
        'how_step_9_cmd' => '„Rolle Makler erstellen, Alex ist Manager.“',
        'how_step_9_reply' => '> Rolle erstellt. \'Alex\' ist Manager.',

        'platforms_title' => 'Wählen Sie Ihre Plattform',
        'platforms_desc' => 'Verwalten Sie Ihr Team über Ihre Lieblings-App.',

        'pricing_title' => 'Preiskalkulator',
        'pricing_desc' => 'Passen Sie den Regler an, um die Kosten zu schätzen.',
        'pricing_msgs' => 'Nachrichten',
        'pricing_member_msgs' => 'Mitgliedsnachrichten',
        'pricing_or' => 'oder',
        'pricing_customer_msgs' => 'Kundennachrichten',
        'pricing_plan' => 'Tarif',
        'pricing_estimated' => 'Geschätzter Preis',
        'pricing_billed' => 'Monatlich abgerechnet',
        'pricing_per_month' => '/Monat',
        'pricing_per_msg' => '/ mitgliedsnachricht',
        'pricing_vat' => '* Alle Preise inkl. MwSt.',
        'pricing_disclaimer' => '* Mitglieder sind interne Teamnutzer, Kunden externe Nutzer. Beide teilen sich ein Nachrichten-Kontingent, werden aber unterschiedlich gewichtet: 1 Mitgliedsnachricht entspricht 10 Kundennachrichten.',

        'contact_title' => 'Contact Us', 'contact_desc' => 'Bereit? Schreiben Sie uns.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estland', 'label_name' => 'Name', 'placeholder_name' => 'Max Mustermann', 'label_email' => 'E-Mail', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Nachricht', 'placeholder_message' => 'Ich möchte starten...', 'btn_submit' => 'Senden',
        'err_name_required' => 'Name fehlt.', 'err_name_length' => 'Name ungültig.', 'err_email_required' => 'E-Mail fehlt.', 'err_email_length' => 'Ungültig.', 'err_message_required' => 'Nachricht fehlt.', 'err_message_length' => 'Ungültig.', 'err_rate_limit' => 'Zu schnell.', 'err_captcha' => 'Fehler.', 'success_received' => 'Empfangen.', 'failure_received' => 'Fehler.', 'submission_problem' => 'Bitte korrigieren:', 'ft_terms' => 'AGB', 'ft_privacy' => 'Datenschutz', 'ft_registry' => 'Register',
        'ft_doc_visual' => 'Doku', 'ft_doc_text' => 'Beispiele', 'ft_pricing' => 'Preise',
        'modal_captcha_title' => 'Sicherheit', 'modal_captcha_close' => 'Schließen',
    ],

    'italian' => [
        'brand' => $appName,
        'nav_home' => 'Home', 'nav_features' => 'Strumenti', 'nav_usecases' => 'Demo', 'nav_contact' => 'Contatti',
        'cta_request' => 'Inizia', 'cta_explore' => 'Come funziona', 'label_dark' => 'Scuro',
        'h1' => 'Il tuo ufficio ora è una chat.',
        'lead' => 'Creato per i professionisti: avvocati, commercialisti, agenti immobiliari e cliniche. Gestisci il team e le attività direttamente su Instagram, Messenger, WhatsApp, Discord, Telegram o Email, supportando i clienti tramite chatroom web personalizzate.',
        'pill_1_title' => 'Ovunque', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Zero Training', 'pill_2_desc' => 'Facile come un SMS', 'pill_3_title' => 'Privato', 'pill_3_desc' => 'Dati sicuri',
        'features_title' => 'Sostituisce la dashboard.', 'features_desc' => 'Fai tutto via chat.',

        'f_1' => 'Portali', 'f_1_desc' => 'Distribuisci chatroom web sicure per i clienti tramite URL univoci. Collegale ai tuoi argomenti interni per fornire un\'assistenza clienti iper-personalizzata.',
        'f_2' => 'Ricerca File/Web', 'f_2_desc' => 'Trova contratti, documenti fiscali o planimetrie in pochi secondi usando il linguaggio naturale.',
        'f_3' => 'Analisi File/Web', 'f_3_desc' => 'Lascia che l\'IA analizzi e riassuma per te complessi documenti legali, rapporti finanziari o link.',
        'f_4' => 'Argomenti', 'f_4_desc' => 'Raggruppa casi di clienti, immobili o cartelle cliniche in spazi dedicati per il lavoro di squadra.',
        'f_5' => 'Istruzioni', 'f_5_desc' => 'Standardizza il tuo servizio. Assegna linee guida rigorose per ruoli specifici (es. Reception).',
        'f_6' => 'Promemoria / Scadenze', 'f_6_desc' => 'Non perdere mai un\'udienza o una scadenza fiscale. Imposta avvisi automatici.',
        'f_7' => 'Annunci', 'f_7_desc' => 'Trasmetti aggiornamenti critici istantaneamente a tutto il team o a membri specifici.',
        'f_8' => 'Scorciatoie', 'f_8_desc' => 'Scrivi di meno. Espandi brevi frasi in risposte professionali complete.',
        'f_9' => 'Ruoli e Manager', 'f_9_desc' => 'Costruisci una solida struttura del team raggruppando i membri e definendo la gestione.',
        'f_10' => 'Accesso', 'f_10_desc' => 'Controlla l\'accesso bloccando la chat al minuto esatto.',
        'f_11' => 'Orario', 'f_11_desc' => 'Imposta routine settimanali flessibili per team o membri.',
        'f_12' => 'Sondaggi', 'f_12_desc' => 'Prendi decisioni più veloci. Crea sondaggi diretti nella chat.',
        'f_13' => 'Generatore', 'f_13_desc' => 'Crea, memorizza e modifica documenti direttamente dai prompt della chat.',
        'f_14' => 'Piani', 'f_14_desc' => 'Trasforma i dati in strategia con piani generati dall\'IA.',
        'f_15' => 'Pannello Web', 'f_15_desc' => 'Passa temporaneamente a una dashboard visiva per i dati del team.',

        'about_title' => 'Perché ' . $appName . '?', 'about_p1' => 'Software classico è lento. ' . $appName . ' è immediato.', 'about_p2' => 'Dai un comando ed è fatto.',
        'how_title' => 'Ci vogliono secondi.', 'how_desc' => 'Scrivi comandi come se parlassi a un assistente.',

        'how_step_1' => 'Portali',
        'how_step_1_cmd' => '“Crea portale per Smith LLC collegato all\'argomento \'Tasse 2025\'.”',
        'how_step_1_reply' => '> Portale \'Smith LLC\' creato con successo. URL generato.',
        'how_step_2' => 'Ricerca File/Web',
        'how_step_2_cmd' => '“Trova il contratto NDA del cliente Johnson di marzo.”',
        'how_step_2_reply' => '> Ricerca completata. Trovati 2 file per \'NDA\'.',
        'how_step_3' => 'Analisi File/Web',
        'how_step_3_cmd' => '“Analizza questo contratto di locazione e riassumi le clausole.”',
        'how_step_3_reply' => '> Analisi completata. Estratte 3 clausole chiave.',
        'how_step_4' => 'Argomenti',
        'how_step_4_cmd' => '“Crea argomento \'Progetto Villa\' per gli ingegneri.”',
        'how_step_4_reply' => '> Argomento creato con 5 membri.',
        'how_step_5' => 'Istruzioni',
        'how_step_5_cmd' => '“Istruzione Reception: Chiedere sempre la carta d\'identità.”',
        'how_step_5_reply' => '> Istruzione aggiunta al ruolo \'Reception\'.',
        'how_step_6' => 'Promemoria / Scadenze',
        'how_step_6_cmd' => '“Ricorda ai contabili la scadenza IVA di martedì.”',
        'how_step_6_reply' => '> Promemoria programmato per il ruolo \'contabili\'.',
        'how_step_7' => 'Annunci',
        'how_step_7_cmd' => '“Annuncia: Il notaio arriva oggi alle 14:00.”',
        'how_step_7_reply' => '> Annuncio inviato a 12 membri.',
        'how_step_8' => 'Scorciatoie',
        'how_step_8_cmd' => '“Crea scorciatoia \'buong\' per \'Buongiorno, come posso aiutarla?\'”',
        'how_step_8_reply' => '> Scorciatoia \'buong\' salvata.',
        'how_step_9' => 'Ruoli e Manager',
        'how_step_9_cmd' => '“Crea ruolo Agenti con Alex manager.”',
        'how_step_9_reply' => '> Ruolo creato. \'Alex\' assegnato come manager.',

        'platforms_title' => 'Scegli la tua piattaforma',
        'platforms_desc' => 'Gestisci il tuo team dalla tua app preferita.',

        'pricing_title' => 'Calcolatore di Prezzi',
        'pricing_desc' => 'Regola lo slider per stimare il costo mensile.',
        'pricing_msgs' => 'Messaggi',
        'pricing_member_msgs' => 'Messaggi Membri',
        'pricing_or' => 'o',
        'pricing_customer_msgs' => 'Messaggi Clienti',
        'pricing_plan' => 'Piano',
        'pricing_estimated' => 'Prezzo Stimato',
        'pricing_billed' => 'Fatturato mensilmente',
        'pricing_per_month' => '/mese',
        'pricing_per_msg' => '/ msg membro',
        'pricing_vat' => '* Tutti i prezzi includono l\'IVA.',
        'pricing_disclaimer' => '* I Membri sono utenti interni al team, mentre i Clienti sono utenti esterni. Condividono un unico pool di messaggi, ma pesano diversamente: 1 messaggio Membro equivale a 10 messaggi Cliente.',

        'contact_title' => 'Contact Us', 'contact_desc' => 'Pronto a semplificare? Scrivici.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estonia', 'label_name' => 'Nome', 'placeholder_name' => 'Mario Rossi', 'label_email' => 'Email', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Messaggio', 'placeholder_message' => 'Voglio iniziare...', 'btn_submit' => 'Invia', 'err_name_required' => 'Manca nome.', 'err_name_length' => 'Non valido.', 'err_email_required' => 'Manca email.', 'err_email_length' => 'Non valida.', 'err_message_required' => 'Manca messaggio.', 'err_message_length' => 'Non valido.', 'err_rate_limit' => 'Troppo veloce.', 'err_captcha' => 'Errore.', 'success_received' => 'Ricevuto.', 'failure_received' => 'Errore.', 'submission_problem' => 'Correggi:', 'ft_terms' => 'Termini', 'ft_privacy' => 'Privacy', 'ft_registry' => 'Registro',
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Esempi', 'ft_pricing' => 'Prezzi',
        'modal_captcha_title' => 'Sicurezza', 'modal_captcha_close' => 'Chiudi',
    ],

    'french' => [
        'brand' => $appName,
        'nav_home' => 'Accueil', 'nav_features' => 'Outils', 'nav_usecases' => 'Démo', 'nav_contact' => 'Contact',
        'cta_request' => 'Démarrer', 'cta_explore' => 'Fonctionnement', 'label_dark' => 'Sombre',
        'h1' => 'Votre bureau est un chat.',
        'lead' => 'Conçu pour les professionnels : avocats, comptables, agents immobiliers et cliniques. Gérez votre équipe et vos tâches directement depuis Instagram, Messenger, WhatsApp, Discord, Telegram ou Email, tout en assistant vos clients via des chatrooms web personnalisées.',
        'pill_1_title' => 'Partout', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Zéro Formation', 'pill_2_desc' => 'Aussi simple qu\'un SMS', 'pill_3_title' => 'Privé', 'pill_3_desc' => 'Données sécurisées',
        'features_title' => 'Remplace votre dashboard.', 'features_desc' => 'Faites tout le travail dans le chat.',

        'f_1' => 'Portails', 'f_1_desc' => 'Déployez des chatrooms web sécurisées pour vos clients via des URL uniques. Liez-les à vos sujets internes pour offrir une assistance ultra-personnalisée.',
        'f_2' => 'Recherche Fichier/Web', 'f_2_desc' => 'Trouvez des contrats, dossiers fiscaux ou plans en quelques secondes à l\'aide du langage naturel.',
        'f_3' => 'Analyse Fichier/Web', 'f_3_desc' => 'Laissez l\'IA analyser et résumer instantanément de lourds dossiers juridiques, rapports financiers ou liens.',
        'f_4' => 'Sujets', 'f_4_desc' => 'Regroupez les dossiers clients, biens immobiliers ou dossiers médicaux dans des espaces dédiés.',
        'f_5' => 'Instructions', 'f_5_desc' => 'Standardisez votre service. Attribuez des directives strictes à des rôles spécifiques (ex: Réception).',
        'f_6' => 'Rappels / Délais', 'f_6_desc' => 'Ne manquez jamais une audience ou une échéance fiscale. Définissez des notifications automatiques.',
        'f_7' => 'Annonces', 'f_7_desc' => 'Diffusez des mises à jour critiques instantanément à toute l\'équipe ou à des personnes spécifiques.',
        'f_8' => 'Raccourcis', 'f_8_desc' => 'Écrivez moins. Transformez de courtes phrases en réponses professionnelles complètes.',
        'f_9' => 'Rôles & Managers', 'f_9_desc' => 'Structurez votre équipe. Regroupez facilement les membres et définissez des niveaux de gestion.',
        'f_10' => 'Accès', 'f_10_desc' => 'Contrôlez l\'accès de l\'équipe à la minute près.',
        'f_11' => 'Planning', 'f_11_desc' => 'Définissez des routines hebdomadaires flexibles par équipe ou par membre.',
        'f_12' => 'Sondages', 'f_12_desc' => 'Prenez des décisions plus rapidement avec des sondages directs dans le chat.',
        'f_13' => 'Générateur', 'f_13_desc' => 'Créez et modifiez des documents directement à partir du chat.',
        'f_14' => 'Plans', 'f_14_desc' => 'Laissez l\'IA générer des plans d\'action pour atteindre vos objectifs.',
        'f_15' => 'Panneau Web', 'f_15_desc' => 'Passez à un tableau de bord visuel pour examiner les données de l\'équipe.',

        'about_title' => 'Pourquoi ' . $appName . ' ?', 'about_p1' => 'Logiciel classique est lent. ' . $appName . ' est immédiat.', 'about_p2' => 'Donnez un ordre, c\'est fait.',
        'how_title' => 'Ça prend des secondes.', 'how_desc' => 'Écrivez vos commandes comme à un assistant.',

        'how_step_1' => 'Portails',
        'how_step_1_cmd' => '« Crée portail pour Smith LLC lié au sujet \'Taxes 2025\'. »',
        'how_step_1_reply' => '> Portail \'Smith LLC\' créé avec succès. URL générée.',
        'how_step_2' => 'Recherche Fichier/Web',
        'how_step_2_cmd' => '« Trouve le contrat NDA du client Johnson de mars dernier. »',
        'how_step_2_reply' => '> Recherche terminée. 2 fichiers trouvés pour \'NDA\'.',
        'how_step_3' => 'Analyse Fichier/Web',
        'how_step_3_cmd' => '« Analyse ce bail et résume les clauses de résiliation. »',
        'how_step_3_reply' => '> Analyse terminée. 3 clauses extraites.',
        'how_step_4' => 'Sujets',
        'how_step_4_cmd' => '« Crée sujet \'Projet Villa\' pour les ingénieurs. »',
        'how_step_4_reply' => '> Sujet créé avec 5 membres.',
        'how_step_5' => 'Instructions',
        'how_step_5_cmd' => '« Instruction Réception : Toujours demander la carte d\'identité. »',
        'how_step_5_reply' => '> Instruction ajoutée au rôle \'Réception\'.',
        'how_step_6' => 'Rappels / Délais',
        'how_step_6_cmd' => '« Rappelle la TVA à la compta mardi à 9h. »',
        'how_step_6_reply' => '> Rappel programmé pour le rôle \'compta\'.',
        'how_step_7' => 'Annonces',
        'how_step_7_cmd' => '« Annonce : Le notaire arrive aujourd\'hui à 14h. »',
        'how_step_7_reply' => '> Annonce envoyée à 12 membres.',
        'how_step_8' => 'Raccourcis',
        'how_step_8_cmd' => '« Crée raccourci \'cdlt\' pour \'Cordialement\' »',
        'how_step_8_reply' => '> Raccourci \'cdlt\' sauvegardé.',
        'how_step_9' => 'Rôles & Managers',
        'how_step_9_cmd' => '« Crée rôle Agents avec Alex comme manager. »',
        'how_step_9_reply' => '> Rôle créé. \'Alex\' est manager.',

        'platforms_title' => 'Choisissez votre plateforme',
        'platforms_desc' => 'Gérez votre équipe depuis votre application préférée.',

        'pricing_title' => 'Calculateur de Prix',
        'pricing_desc' => 'Ajustez le curseur pour estimer votre coût mensuel.',
        'pricing_msgs' => 'Messages',
        'pricing_member_msgs' => 'Messages Membres',
        'pricing_or' => 'ou',
        'pricing_customer_msgs' => 'Messages Clients',
        'pricing_plan' => 'Forfait',
        'pricing_estimated' => 'Prix Estimé',
        'pricing_billed' => 'Facturé mensuellement',
        'pricing_per_month' => '/mois',
        'pricing_per_msg' => '/ msg membre',
        'pricing_vat' => '* Tous les prix incluent la TVA.',
        'pricing_disclaimer' => '* Les Membres sont des utilisateurs internes, tandis que les Clients sont des utilisateurs externes. Ils partagent le même quota de messages, mais sont pondérés différemment : 1 message Membre équivaut à 10 messages Client.',

        'contact_title' => 'Contact Us', 'contact_desc' => 'Prêt à simplifier ? Écrivez-nous.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europe, Estonie', 'label_name' => 'Nom', 'placeholder_name' => 'Jean Dupont', 'label_email' => 'Email', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Message', 'placeholder_message' => 'Je veux intégrer...', 'btn_submit' => 'Envoyer', 'err_name_required' => 'Nom manquant.', 'err_name_length' => 'Invalide.', 'err_email_required' => 'Email manquant.', 'err_email_length' => 'Invalide.', 'err_message_required' => 'Message manquant.', 'err_message_length' => 'Invalide.', 'err_rate_limit' => 'Trop rapide.', 'err_captcha' => 'Erreur.', 'success_received' => 'Reçu.', 'failure_received' => 'Erreur.', 'submission_problem' => 'Erreurs :', 'ft_terms' => 'Conditions', 'ft_privacy' => 'Confidentialité', 'ft_registry' => 'Registre',
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Exemples', 'ft_pricing' => 'Tarifs',
        'modal_captcha_title' => 'Sécurité', 'modal_captcha_close' => 'Fermer',
    ],

    'portuguese' => [
        'brand' => $appName,
        'nav_home' => 'Início', 'nav_features' => 'Ferramentas', 'nav_usecases' => 'Demo', 'nav_contact' => 'Contato',
        'cta_request' => 'Começar', 'cta_explore' => 'Como funciona', 'label_dark' => 'Escuro',
        'h1' => 'Seu escritório agora é um chat.',
        'lead' => 'Feito para profissionais: advogados, contadores, corretores de imóveis e clínicas. Gerencie sua equipe e tarefas direto no Instagram, Messenger, WhatsApp, Discord, Telegram ou Email, enquanto atende clientes através de chatrooms web personalizados.',
        'pill_1_title' => 'Em todo lugar', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Zero Treino', 'pill_2_desc' => 'Simples como SMS', 'pill_3_title' => 'Privado', 'pill_3_desc' => 'Dados seguros',
        'features_title' => 'Substitui seu painel.', 'features_desc' => 'Faça tudo pelo chat.',

        'f_1' => 'Portais', 'f_1_desc' => 'Implante chatrooms web seguros para clientes via URLs únicos. Vincule-os a tópicos internos para fornecer assistência rápida e personalizada.',
        'f_2' => 'Busca de Arquivo/Web', 'f_2_desc' => 'Encontre contratos, registros fiscais ou plantas baixas em segundos usando linguagem natural.',
        'f_3' => 'Análise de Arquivo/Web', 'f_3_desc' => 'Deixe a IA analisar e resumir processos jurídicos complexos, relatórios financeiros ou links instantaneamente.',
        'f_4' => 'Tópicos', 'f_4_desc' => 'Agrupe casos de clientes, propriedades ou arquivos de pacientes em espaços dedicados.',
        'f_5' => 'Instruções', 'f_5_desc' => 'Padronize seu serviço. Atribua diretrizes rigorosas para funções específicas (ex: Recepção).',
        'f_6' => 'Lembretes / Prazos', 'f_6_desc' => 'Nunca perca uma audiência ou prazo fiscal. Configure avisos automatizados para sua equipe.',
        'f_7' => 'Anúncios', 'f_7_desc' => 'Envie atualizações críticas instantaneamente para toda a equipe ou pessoas específicas.',
        'f_8' => 'Atalhos', 'f_8_desc' => 'Digite menos, diga mais. Transforme frases curtas em respostas profissionais completas.',
        'f_9' => 'Funções e Gerentes', 'f_9_desc' => 'Construa uma estrutura de equipe saudável agrupando membros com níveis de gestão claros.',
        'f_10' => 'Acesso', 'f_10_desc' => 'Controle o acesso bloqueando a equipe até os minutos exatos.',
        'f_11' => 'Horário', 'f_11_desc' => 'Configure rotinas semanais para equipes ou membros.',
        'f_12' => 'Enquetes', 'f_12_desc' => 'Tome decisões mais rápido com enquetes diretas no chat.',
        'f_13' => 'Gerador', 'f_13_desc' => 'Crie e edite documentos diretamente dos seus comandos de chat.',
        'f_14' => 'Planos', 'f_14_desc' => 'Transforme dados em estratégia com planos gerados por IA.',
        'f_15' => 'Painel Web', 'f_14_desc' => 'Mude para um painel visual para ver os dados da equipe.',

        'about_title' => 'Por que ' . $appName . '?', 'about_p1' => 'Software tradicional é lento. ' . $appName . ' é imediato.', 'about_p2' => 'Dê o comando, e está feito.',
        'how_title' => 'Leva segundos.', 'how_desc' => 'Escreva comandos como se falasse com um assistente.',

        'how_step_1' => 'Portais',
        'how_step_1_cmd' => '“Criar portal para Smith LLC vinculado ao tópico \'Impostos 2025\'.”',
        'how_step_1_reply' => '> Portal \'Smith LLC\' criado com sucesso. URL gerado.',
        'how_step_2' => 'Busca de Arquivo/Web',
        'how_step_2_cmd' => '“Encontrar o contrato NDA do cliente Johnson de março.”',
        'how_step_2_reply' => '> Busca concluída. 2 arquivos encontrados para \'NDA\'.',
        'how_step_3' => 'Análise de Arquivo/Web',
        'how_step_3_cmd' => '“Analisar este contrato e resumir as cláusulas de rescisão.”',
        'how_step_3_reply' => '> Análise concluída. 3 cláusulas extraídas.',
        'how_step_4' => 'Tópicos',
        'how_step_4_cmd' => '“Criar tópico \'Projeto Villa\' para os engenheiros.”',
        'how_step_4_reply' => '> Tópico criado com 5 membros.',
        'how_step_5' => 'Instruções',
        'how_step_5_cmd' => '“Instrução Recepção: Sempre pedir a identidade.”',
        'how_step_5_reply' => '> Instrução adicionada à função \'Recepção\'.',
        'how_step_6' => 'Lembretes / Prazos',
        'how_step_6_cmd' => '“Lembrar a contabilidade do prazo do IVA na terça.”',
        'how_step_6_reply' => '> Lembrete agendado para a função \'contabilidade\'.',
        'how_step_7' => 'Anúncios',
        'how_step_7_cmd' => '“Anúncio: O notário chega hoje às 14h.”',
        'how_step_7_reply' => '> Anúncio enviado a 12 membros.',
        'how_step_8' => 'Atalhos',
        'how_step_8_cmd' => '“Criar atalho \'btd\' para \'Bom dia, em que posso ajudar?\'”',
        'how_step_8_reply' => '> Atalho \'btd\' salvo.',
        'how_step_9' => 'Funções e Gerentes',
        'how_step_9_cmd' => '“Criar função Corretores com Alex gerente.”',
        'how_step_9_reply' => '> Função criada. \'Alex\' é gerente.',

        'platforms_title' => 'Escolha sua plataforma',
        'platforms_desc' => 'Gerencie sua equipe no seu app favorito.',

        'pricing_title' => 'Calculadora de Preços',
        'pricing_desc' => 'Ajuste para estimar seu custo mensal.',
        'pricing_msgs' => 'Mensagens',
        'pricing_member_msgs' => 'Mensagens de Membros',
        'pricing_or' => 'ou',
        'pricing_customer_msgs' => 'Mensagens de Clientes',
        'pricing_plan' => 'Plano',
        'pricing_estimated' => 'Preço Estimado',
        'pricing_billed' => 'Faturado mensalmente',
        'pricing_per_month' => '/mês',
        'pricing_per_msg' => '/ msg membro',
        'pricing_vat' => '* Todos os preços incluem IVA.',
        'pricing_disclaimer' => '* Membros são usuários internos da equipe, enquanto Clientes são usuários externos. Eles compartilham o mesmo pool de mensagens, mas são ponderados de forma diferente: 1 mensagem de Membro equivale a 10 mensagens de Cliente.',

        'contact_title' => 'Contact Us', 'contact_desc' => 'Pronto para simplificar? Envie mensagem.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estônia', 'label_name' => 'Nome', 'placeholder_name' => 'João Silva', 'label_email' => 'Email', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Mensagem', 'placeholder_message' => 'Quero começar...', 'btn_submit' => 'Enviar', 'err_name_required' => 'Falta nome.', 'err_name_length' => 'Inválido.', 'err_email_required' => 'Falta email.', 'err_email_length' => 'Inválido.', 'err_message_required' => 'Falta mensagem.', 'err_message_length' => 'Inválido.', 'err_rate_limit' => 'Muito rápido.', 'err_captcha' => 'Erro.', 'success_received' => 'Recebido.', 'failure_received' => 'Erro.', 'submission_problem' => 'Erros:', 'ft_terms' => 'Termos', 'ft_privacy' => 'Privacidade', 'ft_registry' => 'Registro',
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Exemplos', 'ft_pricing' => 'Preços',
        'modal_captcha_title' => 'Segurança', 'modal_captcha_close' => 'Fechar',
    ],

    'spanish' => [
        'brand' => $appName,
        'nav_home' => 'Inicio', 'nav_features' => 'Herramientas', 'nav_usecases' => 'Demo', 'nav_contact' => 'Contacto',
        'cta_request' => 'Empezar', 'cta_explore' => 'Cómo funciona', 'label_dark' => 'Oscuro',
        'h1' => 'Su oficina ahora es un chat.',
        'lead' => 'Diseñado para profesionales: abogados, contables, agentes inmobiliarios y clínicas. Gestione su equipo y tareas directamente desde Instagram, Messenger, WhatsApp, Discord, Telegram o Email, mientras atiende a sus clientes a través de chatrooms web personalizados.',
        'pill_1_title' => 'En todas partes', 'pill_1_desc' => 'Instagram, Messenger, WhatsApp, Discord, Telegram, Email',
        'pill_2_title' => 'Cero Formación', 'pill_2_desc' => 'Tan simple como SMS', 'pill_3_title' => 'Privado', 'pill_3_desc' => 'Datos seguros',
        'features_title' => 'Reemplaza su panel.', 'features_desc' => 'Haga todo el trabajo en el chat.',

        'f_1' => 'Portales', 'f_1_desc' => 'Despliegue chatrooms web seguros para clientes a través de URL únicas. Conéctelos a temas internos para brindar una asistencia rápida y personalizada.',
        'f_2' => 'Búsqueda de Archivos/Web', 'f_2_desc' => 'Encuentre contratos, registros fiscales o planos en segundos utilizando lenguaje natural.',
        'f_3' => 'Análisis de Archivos/Web', 'f_3_desc' => 'Deje que la IA analice y resuma complejos expedientes legales, informes financieros o enlaces.',
        'f_4' => 'Temas', 'f_4_desc' => 'Agrupe casos de clientes, propiedades o historiales médicos en espacios dedicados para el equipo.',
        'f_5' => 'Instrucciones', 'f_5_desc' => 'Estandarice su servicio. Asigne pautas estrictas para roles específicos (ej. Recepción).',
        'f_6' => 'Recordatorios / Plazos', 'f_6_desc' => 'Nunca pierda una cita judicial o plazo fiscal. Configure avisos automatizados.',
        'f_7' => 'Anuncios', 'f_7_desc' => 'Difunda actualizaciones críticas al instante a todo el equipo o a personas específicas.',
        'f_8' => 'Atajos', 'f_8_desc' => 'Escriba menos, diga más. Expanda frases cortas en respuestas profesionales completas.',
        'f_9' => 'Roles y Mánagers', 'f_9_desc' => 'Construya una estructura de equipo sólida agrupando miembros con niveles de gestión claros.',
        'f_10' => 'Acceso', 'f_10_desc' => 'Controle el acceso bloqueando al equipo hasta el minuto exacto.',
        'f_11' => 'Horario', 'f_11_desc' => 'Configure rutinas semanales flexibles para equipos o miembros.',
        'f_12' => 'Encuestas', 'f_12_desc' => 'Tome decisiones más rápido con encuestas directas en el chat.',
        'f_13' => 'Generador', 'f_13_desc' => 'Cree y edite documentos directamente desde los comandos del chat.',
        'f_14' => 'Planes', 'f_13_desc' => 'Convierta los datos en estrategia con planes generados por IA.',
        'f_15' => 'Panel Web', 'f_14_desc' => 'Cambie a un panel visual para revisar los datos del equipo.',

        'about_title' => '¿Por qué ' . $appName . '?', 'about_p1' => 'El software clásico es lento. ' . $appName . ' es inmediato.', 'about_p2' => 'Dé una orden y listo.',
        'how_title' => 'Toma segundos.', 'how_desc' => 'Escriba comandos como si hablara con un asistente.',

        'how_step_1' => 'Portales',
        'how_step_1_cmd' => '“Crear portal para Smith LLC vinculado al tema \'Impuestos 2025\'.”',
        'how_step_1_reply' => '> Portal \'Smith LLC\' creado con éxito. URL generada.',
        'how_step_2' => 'Búsqueda de Archivos/Web',
        'how_step_2_cmd' => '“Buscar el contrato NDA del cliente Johnson de marzo.”',
        'how_step_2_reply' => '> Búsqueda completada. 2 archivos encontrados para \'NDA\'.',
        'how_step_3' => 'Análisis de Archivos/Web',
        'how_step_3_cmd' => '“Analizar este contrato y resumir las cláusulas de rescisión.”',
        'how_step_3_reply' => '> Análisis completado. 3 cláusulas extraídas.',
        'how_step_4' => 'Temas',
        'how_step_4_cmd' => '“Crear tema \'Proyecto Villa\' para los ingenieros.”',
        'how_step_4_reply' => '> Tema inicializado con 5 miembros.',
        'how_step_5' => 'Instrucciones',
        'how_step_5_cmd' => '“Instrucción Recepción: Pedir siempre el carnet de identidad.”',
        'how_step_5_reply' => '> Instrucción añadida al rol \'Recepción\'.',
        'how_step_6' => 'Recordatorios / Plazos',
        'how_step_6_cmd' => '“Recordar a contabilidad el plazo del IVA el martes.”',
        'how_step_6_reply' => '> Recordatorio programado para el rol \'contabilidad\'.',
        'how_step_7' => 'Anuncios',
        'how_step_7_cmd' => '“Anuncio: El notario llega hoy a las 14h.”',
        'how_step_7_reply' => '> Anuncio enviado a 12 miembros.',
        'how_step_8' => 'Atajos',
        'how_step_8_cmd' => '“Crear atajo \'sds\' para \'Saludos cordiales\'”',
        'how_step_8_reply' => '> Atajo \'sds\' guardado con éxito.',
        'how_step_9' => 'Roles y Mánagers',
        'how_step_9_cmd' => '“Crear rol Agentes con Alex de mánager.”',
        'how_step_9_reply' => '> Rol creado. \'Alex\' asignado como mánager.',

        'platforms_title' => 'Elige tu plataforma',
        'platforms_desc' => 'Gestiona tu equipo desde tu app favorita.',

        'pricing_title' => 'Calculadora de Precios',
        'pricing_desc' => 'Ajusta el control para estimar tu costo mensual.',
        'pricing_msgs' => 'Mensajes',
        'pricing_member_msgs' => 'Mensajes de Miembros',
        'pricing_or' => 'o',
        'pricing_customer_msgs' => 'Mensajes de Clientes',
        'pricing_plan' => 'Plan',
        'pricing_estimated' => 'Precio Estimado',
        'pricing_billed' => 'Facturado mensualmente',
        'pricing_per_month' => '/mes',
        'pricing_per_msg' => '/ msg miembro',
        'pricing_vat' => '* Todos los precios incluyen IVA.',
        'pricing_disclaimer' => '* Los Miembros son usuarios internos del equipo, mientras que los Clientes son usuarios externos. Ambos comparten un único pool de mensajes, pero se ponderan de forma diferente: 1 mensaje de Miembro equivale a 10 mensajes de Cliente.',

        'contact_title' => 'Contact Us', 'contact_desc' => '¿Listo para simplificar? Escríbanos.', 'contact_email' => IdealisticOfficeVariable::SUPPORT_EMAIL, 'contact_site' => IdealisticOfficeVariable::COMPANY_WEBSITE_URL, 'contact_location' => 'Europa, Estonia', 'label_name' => 'Nombre', 'placeholder_name' => 'Juan Pérez', 'label_email' => 'Email', 'placeholder_email' => 'contact@idealistic.ai', 'label_message' => 'Mensaje', 'placeholder_message' => 'Quero empezar...', 'btn_submit' => 'Enviar', 'err_name_required' => 'Falta nombre.', 'err_name_length' => 'Inválido.', 'err_email_required' => 'Falta email.', 'err_email_length' => 'Inválido.', 'err_message_required' => 'Falta mensaje.', 'err_message_length' => 'Inválido.', 'err_rate_limit' => 'Muy rápido.', 'err_captcha' => 'Fallo.', 'success_received' => 'Recibido.', 'failure_received' => 'Error.', 'submission_problem' => 'Corrija:', 'ft_terms' => 'Términos', 'ft_privacy' => 'Privacidad', 'ft_registry' => 'Registro',
        'ft_doc_visual' => 'Docs', 'ft_doc_text' => 'Ejemplos', 'ft_pricing' => 'Precios',
        'modal_captcha_title' => 'Seguridad', 'modal_captcha_close' => 'Cerrar',
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
            opacity: 0.5;
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

        /* Typing cursor */
        .typing-cursor::after {
            content: '|';
            animation: blink 1s step-start infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        /* Platform Cards Custom Hover CSS */
        .platform-card {
            border: 1px solid var(--border-color);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .platform-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05) !important;
        }

        html[data-theme='dark'] .platform-card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3) !important;
        }

        .border-color {
            border-color: var(--border-color) !important;
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
                                             href="#platforms"><?php echo $t['cta_request']; ?></a></li>

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
                                        <span class="me-2"><?php echo $flags[$langName]; ?></span> <?php echo ucfirst($langName); ?>
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
                    <a href="#platforms"
                       class="btn btn-primary btn-lg rounded-pill"><?php echo $t['cta_request']; ?></a>
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
            $feats = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];
            // Reordered icons to match new priorities
            $icons = ['shop', 'search', 'graph-up', 'folder', 'list-check', 'clock', 'megaphone', 'lightning', 'diagram-3', 'lock', 'calendar3', 'bar-chart', 'file-earmark-plus', 'map', 'window-sidebar'];
            foreach ($feats as $k => $f): ?>
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="feature-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-<?php echo $icons[$k]; ?> feature-icon"></i>
                            <h4 class="fw-bold mb-0"><?php echo $t['f_' . $f]; ?></h4>
                        </div>
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
                <div class="bg-card p-4 rounded-4 shadow-sm timeline-container" id="timelineBox">
                    <?php
                    $steps = ['step_1', 'step_2', 'step_3', 'step_4', 'step_5', 'step_6', 'step_7', 'step_8', 'step_9'];
                    foreach ($steps as $s): ?>
                        <div class="timeline-item">
                            <div class="timeline-bullet"></div>
                            <h5 class="fw-bold mb-2"><?php echo $t['how_' . $s]; ?></h5>
                            <div class="type-container" data-step="<?php echo $s; ?>">
                                <div class="text-primary mb-1 user-line fw-bold" style="min-height: 24px;"></div>
                                <code class="d-block bg-section px-2 py-1 rounded system-line text-secondary-theme"
                                      style="min-height: 28px; opacity: 0;"></code>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="pricing" class="py-5 reveal">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?php echo $t['pricing_title']; ?></h2>
            <p class="text-secondary-theme"><?php echo $t['pricing_desc']; ?></p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-card p-5 rounded-4 shadow-sm border border-color">
                    <div class="mb-4 text-center">
                        <div class="d-flex justify-content-between text-secondary-theme small fw-bold mb-2">
                            <span>1,000 <?php echo $t['pricing_msgs']; ?></span>
                            <span>10,000 <?php echo $t['pricing_msgs']; ?></span>
                        </div>
                        <input type="range" class="form-range" id="pricingSlider" min="0" max="6" step="1" value="0">
                        <div class="mt-3 fs-5 fw-bold text-secondary-theme">
                            <span id="sliderValue"
                                  class="text-primary fs-3">1,000</span> <?php echo $t['pricing_member_msgs']; ?><br>
                            <span class="fs-6 fw-normal"><?php echo $t['pricing_or']; ?> <span id="customerValue"
                                                                                               class="text-primary fs-4">10,000</span> <?php echo $t['pricing_customer_msgs']; ?></span>
                        </div>
                        <div class="small text-primary fw-bold mt-1" id="planName">
                            Solo <?php echo $t['pricing_plan']; ?></div>
                    </div>
                    <hr class="my-4 border-color">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-0 text-body"><?php echo $t['pricing_estimated']; ?></h3>
                            <small class="text-secondary-theme"><?php echo $t['pricing_billed']; ?></small>
                        </div>
                        <div class="text-end">
                            <h2 class="fw-bold text-primary mb-0">€<span id="calculatedPrice">99</span></h2>
                            <small class="text-secondary-theme"><?php echo $t['pricing_per_month']; ?></small><br>
                            <small class="text-secondary-theme" style="font-size: 0.75rem;">(€<span id="pricePerMsg">0.099</span>
                                <?php echo $t['pricing_per_msg']; ?>)</small>
                        </div>
                    </div>
                    <div class="mt-4 text-start small text-secondary-theme">
                        <p class="mb-1"><?php echo $t['pricing_vat']; ?></p>
                        <p class="mb-0"><?php echo $t['pricing_disclaimer']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="platforms" class="py-5 bg-section reveal">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?php echo $t['platforms_title']; ?></h2>
            <p class="text-secondary-theme"><?php echo $t['platforms_desc']; ?></p>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="https://www.instagram.com/idealistic.ai" target="_blank"
                   class="platform-card text-center d-block p-4 rounded-4 bg-card text-decoration-none shadow-sm">
                    <i class="bi bi-instagram fs-1" style="color: #E1306C;"></i>
                    <span class="d-block mt-2 fw-bold text-body">Instagram</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="https://www.facebook.com/idealisticai" target="_blank"
                   class="platform-card text-center d-block p-4 rounded-4 bg-card text-decoration-none shadow-sm">
                    <i class="bi bi-messenger fs-1" style="color: #0084FF;"></i>
                    <span class="d-block mt-2 fw-bold text-body">Messenger</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="https://t.me/idealisticBot" target="_blank"
                   class="platform-card text-center d-block p-4 rounded-4 bg-card text-decoration-none shadow-sm">
                    <i class="bi bi-telegram fs-1" style="color: #0088cc;"></i>
                    <span class="d-block mt-2 fw-bold text-body">Telegram</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="https://discord.com/invite/kmFJWcRtSP" target="_blank"
                   class="platform-card text-center d-block p-4 rounded-4 bg-card text-decoration-none shadow-sm">
                    <i class="bi bi-discord fs-1" style="color: #5865F2;"></i>
                    <span class="d-block mt-2 fw-bold text-body">Discord</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="https://wa.me/message/YA5Z4B5YULQZA1" target="_blank"
                   class="platform-card text-center d-block p-4 rounded-4 bg-card text-decoration-none shadow-sm">
                    <i class="bi bi-whatsapp fs-1" style="color: #25D366;"></i>
                    <span class="d-block mt-2 fw-bold text-body">WhatsApp</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="mailto:<?php echo IdealisticOfficeVariable::SUPPORT_EMAIL; ?>"
                   class="platform-card text-center d-block p-4 rounded-4 bg-card text-decoration-none shadow-sm">
                    <i class="bi bi-envelope fs-1 text-primary"></i>
                    <span class="d-block mt-2 fw-bold text-body">Email</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="bg-section">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-6 text-center mb-4 reveal">
                <h2 class="fw-bold"><?php echo $t['contact_title']; ?></h2>
                <p class="text-secondary-theme"><?php echo $t['contact_desc']; ?></p>
            </div>
        </div>
        <div class="row justify-content-center reveal pb-5">
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
                                  placeholder="<?php echo $t['placeholder_message']; ?>"
                                  style="resize: vertical; min-height: 85px;"><?php echo htmlspecialchars($message); ?></textarea>
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
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/documentation/visual"
               target="_blank"><i class="bi bi-book"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_doc_visual']; ?></span></a>
            <a class="d-flex align-items-center gap-2"
               href="<?php echo IdealisticOfficeVariable::APPLICATION_SUB_DIRECTORY ?>/documentation/examples"
               target="_blank"><i class="bi bi-lightbulb"></i><span
                        class="d-none d-md-inline"><?php echo $t['ft_doc_text']; ?></span></a>
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

<script>
    const typingData = {
        'step_1': {
            user: <?php echo json_encode($t['how_step_1_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_1_reply']); ?> },
        'step_2': {
            user: <?php echo json_encode($t['how_step_2_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_2_reply']); ?> },
        'step_3': {
            user: <?php echo json_encode($t['how_step_3_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_3_reply']); ?> },
        'step_4': {
            user: <?php echo json_encode($t['how_step_4_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_4_reply']); ?> },
        'step_5': {
            user: <?php echo json_encode($t['how_step_5_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_5_reply']); ?> },
        'step_6': {
            user: <?php echo json_encode($t['how_step_6_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_6_reply']); ?> },
        'step_7': {
            user: <?php echo json_encode($t['how_step_7_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_7_reply']); ?> },
        'step_8': {
            user: <?php echo json_encode($t['how_step_8_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_8_reply']); ?> },
        'step_9': {
            user: <?php echo json_encode($t['how_step_9_cmd']); ?>,
            sys: <?php echo json_encode($t['how_step_9_reply']); ?> }
    };
</script>

<script src="https://www.idealistic.ai/.scripts/bootstrap.bundle.min.js"></script>
<script>
    // Theme Toggling Logic
    const toggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const root = document.documentElement;

    function setTheme(theme) {
        root.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);

        if (themeIcon) {
            themeIcon.className = theme === 'dark' ? 'bi bi-moon-fill text-white' : 'bi bi-sun-fill text-warning';
        }
        const toggler = document.querySelector('.navbar-toggler-icon');
        if (toggler) toggler.style.filter = theme === 'dark' ? 'invert(1)' : 'invert(0)';
    }

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

    // Typing Animation Logic
    const timelineBox = document.getElementById('timelineBox');
    let hasTyped = false;

    async function typeText(element, text, speed = 25) {
        element.classList.add('typing-cursor');
        element.style.opacity = 1;
        element.innerText = '';
        for (let i = 0; i < text.length; i++) {
            element.innerText += text.charAt(i);
            await new Promise(r => setTimeout(r, speed));
        }
        element.classList.remove('typing-cursor');
    }

    async function runTypingSequence() {
        if (hasTyped) return;
        hasTyped = true;

        const keys = ['step_1', 'step_2', 'step_3', 'step_4', 'step_5', 'step_6', 'step_7', 'step_8', 'step_9'];

        for (const key of keys) {
            const container = document.querySelector(`.type-container[data-step="${key}"]`);
            if (!container) continue;

            const userElem = container.querySelector('.user-line');
            const sysElem = container.querySelector('.system-line');
            const data = typingData[key];

            // Type User Command
            await typeText(userElem, data.user, 30);
            await new Promise(r => setTimeout(r, 300)); // Pause before reply

            // Type System Reply
            await typeText(sysElem, data.sys, 15); // Faster for system
            await new Promise(r => setTimeout(r, 600)); // Pause before next step
        }
    }

    const typeObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                runTypingSequence();
                typeObserver.disconnect();
            }
        });
    }, {threshold: 0.3});

    if (timelineBox) {
        typeObserver.observe(timelineBox);
    }

    // Pricing Slider Logic
    const pricingSlider = document.getElementById('pricingSlider');
    const sliderValue = document.getElementById('sliderValue');
    const calculatedPrice = document.getElementById('calculatedPrice');
    const planName = document.getElementById('planName');

    // UI constants for localized string injections
    const planTranslated = <?php echo json_encode(" " . $t['pricing_plan']); ?>;

    // Added constants for UI
    const customerValue = document.getElementById('customerValue');
    const pricePerMsg = document.getElementById('pricePerMsg');

    const pricingData = [
        {messages: "1,000", customer: "10,000", price: "99", name: "Solo", perMsg: "0.099"},
        {messages: "2,000", customer: "20,000", price: "169", name: "Solo+", perMsg: "0.085"},
        {messages: "3,000", customer: "30,000", price: "239", name: "Pro", perMsg: "0.08"},
        {messages: "4,000", customer: "40,000", price: "299", name: "Pro+", perMsg: "0.075"},
        {messages: "6,000", customer: "60,000", price: "349", name: "Max", perMsg: "0.058"},
        {messages: "8,000", customer: "80,000", price: "399", name: "Max+", perMsg: "0.05"},
        {messages: "10,000", customer: "100,000", price: "499", name: "Ultra", perMsg: "0.05"}
    ];

    if (pricingSlider) {
        pricingSlider.addEventListener('input', function () {
            const val = parseInt(this.value);
            const data = pricingData[val];
            sliderValue.innerText = data.messages;
            calculatedPrice.innerText = data.price;
            if (planName) planName.innerText = data.name + planTranslated;
            if (customerValue) customerValue.innerText = data.customer;
            if (pricePerMsg) pricePerMsg.innerText = data.perMsg;
        });
        // Init value
        pricingSlider.dispatchEvent(new Event('input'));
    }
</script>
</body>
</html>