<?php

declare(strict_types=1);

return [
    'accepted'             => 'Le champ :attribute doit être accepté.',
    'accepted_if'          => 'Le champ :attribute doit être accepté quand :other est :value.',
    'active_url'           => 'Le champ :attribute n\'est pas une URL valide.',
    'after'                => 'Le champ :attribute doit être une date postérieure à :date.',
    'after_or_equal'       => 'Le champ :attribute doit être une date postérieure ou égale à :date.',
    'alpha'                => 'Le champ :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le champ :attribute ne peut contenir que des lettres, des chiffres, des tirets et des underscores.',
    'alpha_num'            => 'Le champ :attribute ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'ascii'                => 'Le champ :attribute ne peut contenir que des caractères alphanumériques simples et des symboles.',
    'before'               => 'Le champ :attribute doit être une date antérieure à :date.',
    'before_or_equal'      => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between'              => [
        'array'   => 'Le champ :attribute doit contenir entre :min et :max éléments.',
        'file'    => 'Le champ :attribute doit être compris entre :min et :max kilo-octets.',
        'numeric' => 'Le champ :attribute doit être compris entre :min et :max.',
        'string'  => 'Le champ :attribute doit être compris entre :min et :max caractères.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'can'                  => 'Le champ :attribute contient une valeur non autorisée.',
    'confirmed'            => 'La confirmation du champ :attribute ne correspond pas.',
    'current_password'     => 'Le mot de passe est incorrect.',
    'date'                 => 'Le champ :attribute doit être une date valide.',
    'date_equals'          => 'Le champ :attribute doit être une date égale à :date.',
    'date_format'          => 'Le champ :attribute doit correspondre au format :format.',
    'decimal'              => 'Le champ :attribute doit avoir :decimal décimales.',
    'declined'             => 'Le champ :attribute doit être refusé.',
    'declined_if'          => 'Le champ :attribute doit être refusé lorsque :other est :value.',
    'different'            => 'Les champs :attribute et :other doivent être différents.',
    'digits'               => 'Le champ :attribute doit avoir :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit être compris entre :min et :max chiffres.',
    'dimensions'           => 'Le champ :attribute a des dimensions d\'image invalides.',
    'distinct'             => 'Le champ :attribute a une valeur en double.',
    'doesnt_end_with'      => 'Le champ :attribute ne doit pas se terminer par l\'un des éléments suivants : :values.',
    'doesnt_start_with'    => 'Le champ :attribute ne doit pas commencer par l\'un des éléments suivants : :values.',
    'email'                => 'Le champ :attribute doit être une adresse email valide.',
    'ends_with'            => 'Le champ :attribute doit se terminer par l\'un des éléments suivants : :values.',
    'enum'                 => 'La sélection de :attribute est invalide.',
    'exists'               => 'La sélection de :attribute est invalide.',
    'extensions'           => 'Le champ :attribute doit avoir l\'une des extensions suivantes : :values.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute doit avoir une valeur.',
    'gt'                   => [
        'array'   => 'Le champ :attribute doit avoir plus de :value éléments.',
        'file'    => 'Le champ :attribute doit être supérieur à :value kilo-octets.',
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'string'  => 'Le champ :attribute doit être supérieur à :value caractères.',
    ],
    'gte'                  => [
        'array'   => 'Le champ :attribute doit avoir :value éléments ou plus.',
        'file'    => 'Le champ :attribute doit être supérieur ou égal à :value kilo-octets.',
        'numeric' => 'Le champ :attribute doit être supérieur ou égal à :value.',
        'string'  => 'Le champ :attribute doit être supérieur ou égal à :value caractères.',
    ],
    'hex_color'            => 'Le champ :attribute doit être une couleur hexadécimale valide.',
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'La sélection de :attribute est invalide.',
    'in_array'             => 'Le champ :attribute doit exister dans :other.',
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le champ :attribute doit être une chaîne JSON valide.',
    'lowercase'            => 'Le champ :attribute doit être en minuscules.',
    'lt'                   => [
        'array'   => 'Le champ :attribute doit avoir moins de :value éléments.',
        'file'    => 'Le champ :attribute doit être inférieur à :value kilo-octets.',
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'string'  => 'Le champ :attribute doit être inférieur à :value caractères.',
    ],
    'lte'                  => [
        'array'   => 'Le champ :attribute ne doit pas avoir plus de :value éléments.',
        'file'    => 'Le champ :attribute doit être inférieur ou égal à :value kilo-octets.',
        'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
        'string'  => 'Le champ :attribute doit être inférieur ou égal à :value caractères.',
    ],
    'mac_address'          => 'Le champ :attribute doit être une adresse MAC valide.',
    'max'                  => [
        'array'   => 'Le champ :attribute ne doit pas avoir plus de :max éléments.',
        'file'    => 'Le champ :attribute ne doit pas être supérieur à :max kilo-octets.',
        'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
        'string'  => 'Le champ :attribute ne doit pas être supérieur à :max caractères.',
    ],
    'max_digits'           => 'Le champ :attribute ne doit pas contenir plus de :max chiffres.',
    'mimes'                => 'Le champ :attribute doit être un fichier de type : :values.',
    'mimetypes'            => 'Le champ :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'array'   => 'Le champ :attribute doit contenir au moins :min éléments.',
        'file'    => 'Le champ :attribute doit être d\'au moins :min kilo-octets.',
        'numeric' => 'Le champ :attribute doit être d\'au moins :min.',
        'string'  => 'Le champ :attribute doit contenir au moins :min caractères.',
    ],
    'min_digits'           => 'Le champ :attribute doit contenir au moins :min chiffres.',
    'missing'              => 'Le champ :attribute doit être manquant.',
    'missing_if'           => 'Le champ :attribute doit être manquant lorsque :other est :value.',
    'missing_unless'       => 'Le champ :attribute doit être manquant à moins que :other ne soit :value.',
    'missing_with'         => 'Le champ :attribute doit être manquant lorsque :values est présent.',
    'missing_with_all'     => 'Le champ :attribute doit être manquant lorsque :values sont présents.',
    'multiple_of'          => 'Le champ :attribute doit être un multiple de :value.',
    'not_in'               => 'La sélection de :attribute est invalide.',
    'not_regex'            => 'Le format du champ :attribute est invalide.',
    'numeric'              => 'Le champ :attribute doit être un nombre.',
    'password'             => [
        'letters'       => 'Le champ :attribute doit contenir au moins une lettre.',
        'mixed'         => 'Le champ :attribute doit contenir au moins une lettre majuscule et une lettre minuscule.',
        'numbers'       => 'Le champ :attribute doit contenir au moins un chiffre.',
        'symbols'       => 'Le champ :attribute doit contenir au moins un symbole.',
        'uncompromised' => 'Le :attribute donné est apparu dans une fuite de données. Veuillez choisir un autre :attribute.',
    ],
    'present'              => 'Le champ :attribute doit être présent.',
    'present_if'           => 'Le champ :attribute doit être présent lorsque :other est :value.',
    'present_unless'       => 'Le champ :attribute doit être présent sauf si :other est :value.',
    'present_with'         => 'Le champ :attribute doit être présent lorsque :values est présent.',
    'present_with_all'     => 'Le champ :attribute doit être présent lorsque :values sont présents.',
    'prohibited'           => 'Le champ :attribute est interdit.',
    'prohibited_if'        => 'Le champ :attribute est interdit lorsque :other est :value.',
    'prohibited_unless'    => 'Le champ :attribute est interdit sauf si :other est dans :values.',
    'prohibits'            => 'Le champ :attribute interdit que :other soit présent.',
    'regex'                => 'Le format du champ :attribute est invalide.',
    'required'             => 'Le champ :attribute est requis.',
    'required_array_keys'  => 'Le champ :attribute doit contenir des entrées pour :values.',
    'required_if'          => 'Le champ :attribute est requis lorsque :other est :value.',
    'required_if_accepted' => 'Le champ :attribute est requis lorsque :other est accepté.',
    'required_unless'      => 'Le champ :attribute est requis sauf si :other est dans :values.',
    'required_with'        => 'Le champ :attribute est requis lorsque :values est présent.',
    'required_with_all'    => 'Le champ :attribute est requis lorsque :values sont présents.',
    'required_without'     => 'Le champ :attribute est requis lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis lorsque aucun de :values n\'est présent.',
    'same'                 => 'Le champ :attribute doit correspondre à :other.',
    'size'                 => [
        'array'   => 'Le champ :attribute doit contenir :size éléments.',
        'file'    => 'Le champ :attribute doit être de :size kilo-octets.',
        'numeric' => 'Le champ :attribute doit être de :size.',
        'string'  => 'Le champ :attribute doit être de :size caractères.',
    ],
    'starts_with'          => 'Le champ :attribute doit commencer par l\'un des éléments suivants : :values.',
    'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone'             => 'Le champ :attribute doit être un fuseau horaire valide.',
    'ulid' => 'Le champ :attribute doit être un ULID valide.',
    'unique' => 'Le :attribute a déjà été pris.',
    'uploaded' => 'Le téléchargement de :attribute a échoué.',
    'uppercase' => 'Le champ :attribute doit être en majuscules.',
    'url' => 'Le champ :attribute doit être une URL valide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',
    'attributes' => [
        'address' => 'adresse',
        'affiliate_url' => 'URL affiliée',
        'age' => 'âge',
        'amount' => 'montant',
        'area' => 'zone',
        'available' => 'disponible',
        'birthday' => 'date de naissance',
        'body' => 'corps',
        'city' => 'ville',
        'content' => 'contenu',
        'country' => 'pays',
        'created_at' => 'créé à',
        'creator' => 'créateur',
        'currency' => 'devise',
        'current_password' => 'mot de passe actuel',
        'customer' => 'client',
        'date' => 'date',
        'date_of_birth' => 'date de naissance',
        'day' => 'jour',
        'deleted_at' => 'supprimé à',
        'description' => 'description',
        'district' => 'district',
        'duration' => 'durée',
        'email' => 'email',
        'excerpt' => 'extrait',
        'filter' => 'filtre',
        'first_name' => 'prénom',
        'gender' => 'genre',
        'group' => 'groupe',
        'hour' => 'heure',
        'image' => 'image',
        'is_subscribed' => 'est abonné',
        'items' => 'articles',
        'last_name' => 'nom de famille',
        'lesson' => 'leçon',
        'line_address_1' => 'adresse ligne 1',
        'line_address_2' => 'adresse ligne 2',
        'message' => 'message',
        'middle_name' => 'deuxième prénom',
        'minute' => 'minute',
        'mobile' => 'mobile',
        'month' => 'mois',
        'name' => 'nom',
        'national_code' => 'code national',
        'number' => 'nombre',
        'password' => 'mot de passe',
        'password_confirmation' => 'confirmation du mot de passe',
        'phone' => 'téléphone',
        'photo' => 'photo',
        'postal_code' => 'code postal',
        'preview' => 'aperçu',
        'price' => 'prix',
        'product_id' => 'identifiant de produit',
        'product_uid' => 'UID de produit',
        'product_uuid' => 'UUID de produit',
        'promo_code' => 'code promo',
        'province' => 'province',
        'quantity' => 'quantité',
        'recaptcha_response_field' => 'champ de réponse recaptcha',
        'remember' => 'se souvenir de moi',
        'restored_at' => 'restauré à',
        'result_text_under_image' => 'texte de résultat sous l\'image',
        'role' => 'rôle',
        'second' => 'seconde',
        'sex' => 'sexe',
        'shipment' => 'expédition',
        'short_text' => 'texte court',
        'size' => 'taille',
        'state' => 'état',
        'street' => 'rue',
        'student' => 'étudiant',
        'subject' => 'sujet',
        'teacher' => 'enseignant',
        'terms' => 'conditions',
        'test_description' => 'description du test',
        'test_locale' => 'localisation du test',
        'test_name' => 'nom du test',
        'text' => 'texte',
        'time' => 'temps',
        'title' => 'titre',
        'updated_at' => 'mis à jour à',
        'user' => 'utilisateur',
        'username' => 'nom d\'utilisateur',
        'year' => 'année',
    ],
];