<?php
/*
 @author    Teodor Markov
 @copyright 2026 Teodor Markov
 @version   1.0.0
*/
while (true) {
    print("Mainmenu\n*************\n|1|List\n|2|Show Adress\n|3|Insert New Adress\n|4|Delete Adress\n|5|End\n");
    $line = readline("Enter: ");

    switch ($line) {

        case 1:
            print("Adressmanagement - List\n");
            $json = file_get_contents('adresses.json');
            $data = json_decode($json, true);
            foreach ($data as $person) {
                print("ID: " . $person['id'] . "\n");
                print("Name: " . $person['firstname'] . " " . $person['lastname'] . "\n");
                print("Adress: " . $person['street'] . "\n");
                print("Zip Code: " . $person['zipcode'] . "\n");
                print("Place: " . $person['place'] . "\n");
                print("\n");
            }
            $answer = readline("Continue? (y/n): ");
            if (strtolower($answer) === 'y' or strtoupper($answer) === 'Y') {
                break;
                exit();
            } else {
                print("End...\n");
            }
            break;

        case 2:
            print("Adressmanagement - Show Adress\n");
            $json = file_get_contents('adresses.json');
            $data = json_decode($json, true);
            $show = readline("ID?: ");
            foreach ($data as $person) {
                if ($person['id'] == $show) {
                    print("Name: " . $person['firstname'] . " " . $person['lastname'] . "\n");
                    print("Adress: " . $person['street'] . "\n");
                    print("Zip Code: " . $person['zipcode'] . "\n");
                    print("Place: " . $person['place'] . "\n");
                    print("\n");

                    break;
                }
            }

            $answer = readline("Continue? (y/n): ");
            if (strtolower($answer) === 'y' or strtoupper($answer) === 'Y') {
                break;
            } else {
                print("End...\n");
                exit();
            }
        case 3:
            print("Adressmanagement - Insert New Adress\n");
            $adresses = 'adresses.json';

            $data = [];
            if (file_exists($adresses)) {
                $json = file_get_contents($adresses);
                $data = json_decode($json, true) ?? [];
            }

            $firstname = readline("First name?: ");
            $lastname = readline("Last name?: ");
            $street = readline("Street?: ");
            $zipcode = readline("Zip Code?: ");
            $place = readline("City?: ");
            $save = readline("Save? (y/n): ");

            if (strtolower($save) === 'y') {

                $newID = 1;
                if (!empty($data)) {
                    $newID = max(array_column($data, 'id')) + 1;
                }

                $array = [
                    'id' => $newID,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'street' => $street,
                    'zipcode' => $zipcode,
                    'place' => $place
                ];

                $data[] = $array;

                file_put_contents($adresses, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

                print("Adress successfully saved!\n");
            } else {
                print("Aborted. Adress was not saved.\n");
            }
            break;

        case 4:
            print("Adressmanagement - Delete Adress\n");
            $adresses = 'adresses.json';

            $data = [];
            if (file_exists($adresses)) {
                $json = file_get_contents($adresses);
                $data = json_decode($json, true) ?? [];
            }

            $deleteID = readline("Which ID should be deleted?: ");

            $newList = [];
            $deleted = false;

            foreach ($data as $person) {
                if ($person['id'] == $deleteID) {
                    $deleted = true;
                    continue;
                }
                $newList[] = $person;
            }

            if ($deleted) {
                file_put_contents($adresses, json_encode($newList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                print("ID $deleteID was successfully deleted.\n");
            } else {
                print("ID $deleteID was not found. Nothing deleted.\n");
            }
            break;

        case 5:
            print("End...\n");
            exit();
            break;

        default:
            print("This option is not available\n");
    }
}
