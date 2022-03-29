<?php

namespace Drupal\newsletter_subscriptions\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class NewsLetterForm.
 */
class NewsLetterForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'news_letter_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#required' => true,
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    
    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => true,
    ];
    
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => true,
    ];
    
    $form['country'] = [
      '#type' => 'select',
      '#title' => $this->t('Country'),
      '#options' => $this->countriesList(),
      '#required' => true,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $query = \Drupal::entityQuery('news_letter_subscription')
      ->condition('mail', $form_state->getValue('email'));
   
    $result = $query->execute();
    if(!empty($result)) {
      $form_state->setErrorByName('email', $this->t('Email already exists.'));
    }

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $first_name = $form_state->getValue('first_name');
    $last_name = $form_state->getValue('last_name');
    $email = $form_state->getValue('email');
    $country = $form_state->getValue('country');
    $subscription = \Drupal\newsletter_subscriptions\Entity\NewsLetterSubscription::create([
      'mail' => $email,
      'status' => true,
      'firstname' => $first_name,
      'lastname' => $last_name,
      'country' => $country,
      'status' => true,
    ]);
    $subscription->save();
    
    \Drupal::messenger()->addStatus($this->t('Thank you for submitting to the newsletter'));
  }

  public function countriesList(){
    return [ 
      "Afghanistan" => "Afghanistan",
      "Åland Islands" => "Åland Islands",
      "Albania" => "Albania",
      "Algeria" => "Algeria",
      "American Samoa" => "American Samoa",
      "AndorrA" => "AndorrA",
      "Angola" => "Angola",
      "Anguilla" => "Anguilla",
      "Antarctica" => "Antarctica",
      "Antigua and Barbuda" => "Antigua and Barbuda",
      "Argentina" => "Argentina",
      "Armenia" => "Armenia",
      "Aruba" => "Aruba",
      "Australia" => "Australia",
      "Austria" => "Austria",
      "Azerbaijan" => "Azerbaijan",
      "Bahamas" => "Bahamas",
      "Bahrain" => "Bahrain",
      "Bangladesh" => "Bangladesh",
      "Barbados" => "Barbados",
      "Belarus" => "Belarus",
      "Belgium" => "Belgium",
      "Belize" => "Belize",
      "Benin" => "Benin",
      "Bermuda" => "Bermuda",
      "Bhutan" => "Bhutan",
      "Bolivia" => "Bolivia",
      "Bosnia and Herzegovina" => "Bosnia and Herzegovina",
      "Botswana" => "Botswana",
      "Bouvet Island" => "Bouvet Island",
      "Brazil" => "Brazil",
      "British Indian Ocean Territory" => "British Indian Ocean Territory",
      "Brunei Darussalam" => "Brunei Darussalam",
      "Bulgaria" => "Bulgaria",
      "Burkina Faso" => "Burkina Faso",
      "Burundi" => "Burundi",
      "Cambodia" => "Cambodia",
      "Cameroon" => "Cameroon",
      "Canada" => "Canada",
      "Cape Verde" => "Cape Verde",
      "Cayman Islands" => "Cayman Islands",
      "Central African Republic" => "Central African Republic",
      "Chad" => "Chad",
      "Chile" => "Chile",
      "China" => "China",
      "Christmas Island" => "Christmas Island",
      "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands",
      "Colombia" => "Colombia",
      "Comoros" => "Comoros",
      "Congo" => "Congo",
      "Congo, The Democratic Republic of the" => "Congo, The Democratic Republic of the",
      "Cook Islands" => "Cook Islands",
      "Costa Rica" => "Costa Rica",
      "Cote D"=> "Cote D",
      "Croatia" => "Croatia",
      "Cuba" => "Cuba",
      "Cyprus" => "Cyprus",
      "Czech Republic" => "Czech Republic",
      "Denmark" => "Denmark",
      "Djibouti" => "Djibouti",
      "Dominica" => "Dominica",
      "Dominican Republic" => "Dominican Republic",
      "Ecuador" => "Ecuador",
      "Egypt" => "Egypt",
      "El Salvador" => "El Salvador",
      "Equatorial Guinea" => "Equatorial Guinea",
      "Eritrea" => "Eritrea",
      "Estonia" => "Estonia",
      "Ethiopia" => "Ethiopia",
      "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)",
      "Faroe Islands" => "Faroe Islands",
      "Fiji" => "Fiji",
      "Finland" => "Finland",
      "France" => "France",
      "French Guiana" => "French Guiana",
      "French Polynesia" => "French Polynesia",
      "French Southern Territories" => "French Southern Territories",
      "Gabon" => "Gabon",
      "Gambia" => "Gambia",
      "Georgia" => "Georgia",
      "Germany" => "Germany",
      "Ghana" => "Ghana",
      "Gibraltar" => "Gibraltar",
      "Greece" => "Greece",
      "Greenland" => "Greenland",
      "Grenada" => "Grenada",
      "Guadeloupe" => "Guadeloupe",
      "Guam" => "Guam",
      "Guatemala" => "Guatemala",
      "Guernsey" => "Guernsey",
      "Guinea" => "Guinea",
      "Guinea-Bissau" => "Guinea-Bissau",
      "Guyana" => "Guyana",
      "Haiti" => "Haiti",
      "Heard Island and Mcdonald Islands" => "Heard Island and Mcdonald Islands",
      "Holy See (Vatican City State)" => "Holy See (Vatican City State)",
      "Honduras" => "Honduras",
      "Hong Kong" => "Hong Kong",
      "Hungary" => "Hungary",
      "Iceland" => "Iceland",
      "India" => "India",
      "Indonesia" => "Indonesia",
      "Iran, Islamic Republic Of" => "Iran, Islamic Republic Of",
      "Iraq" => "Iraq",
      "Ireland" => "Ireland",
      "Isle of Man" => "Isle of Man",
      "Israel" => "Israel",
      "Italy" => "Italy",
      "Jamaica" => "Jamaica",
      "Japan" => "Japan",
      "Jersey" => "Jersey",
      "Jordan" => "Jordan",
      "Kazakhstan" => "Kazakhstan",
      "Kenya" => "Kenya",
      "Kiribati" => "Kiribati",
      "Korea, Democratic People"=> "Korea, Democratic People",
      "Korea, Republic of" => "Korea, Republic of",
      "Kuwait" => "Kuwait",
      "Kyrgyzstan" => "Kyrgyzstan",
      "Lao People"=> "Lao People",
      "Latvia" => "Latvia",
      "Lebanon" => "Lebanon",
      "Lesotho" => "Lesotho",
      "Liberia" => "Liberia",
      "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya",
      "Liechtenstein" => "Liechtenstein",
      "Lithuania" => "Lithuania",
      "Luxembourg" => "Luxembourg",
      "Macao" => "Macao",
      "Macedonia, The Former Yugoslav Republic of" => "Macedonia, The Former Yugoslav Republic of",
      "Madagascar" => "Madagascar",
      "Malawi" => "Malawi",
      "Malaysia" => "Malaysia",
      "Maldives" => "Maldives",
      "Mali" => "Mali",
      "Malta" => "Malta",
      "Marshall Islands" => "Marshall Islands",
      "Martinique" => "Martinique",
      "Mauritania" => "Mauritania",
      "Mauritius" => "Mauritius",
      "Mayotte" => "Mayotte",
      "Mexico" => "Mexico",
      "Micronesia, Federated States of" => "Micronesia, Federated States of",
      "Moldova, Republic of" => "Moldova, Republic of",
      "Monaco" => "Monaco",
      "Mongolia" => "Mongolia",
      "Montserrat" => "Montserrat",
      "Morocco" => "Morocco",
      "Mozambique" => "Mozambique",
      "Myanmar" => "Myanmar",
      "Namibia" => "Namibia",
      "Nauru" => "Nauru",
      "Nepal" => "Nepal",
      "Netherlands" => "Netherlands",
      "Netherlands Antilles" => "Netherlands Antilles",
      "New Caledonia" => "New Caledonia",
      "New Zealand" => "New Zealand",
      "Nicaragua" => "Nicaragua",
      "Niger" => "Niger",
      "Nigeria" => "Nigeria",
      "Niue" => "Niue",
      "Norfolk Island" => "Norfolk Island",
      "Northern Mariana Islands" => "Northern Mariana Islands",
      "Norway" => "Norway",
      "Oman" => "Oman",
      "Pakistan" => "Pakistan",
      "Palau" => "Palau",
      "Palestinian Territory, Occupied" => "Palestinian Territory, Occupied",
      "Panama" => "Panama",
      "Papua New Guinea" => "Papua New Guinea",
      "Paraguay" => "Paraguay",
      "Peru" => "Peru",
      "Philippines" => "Philippines",
      "Pitcairn" => "Pitcairn",
      "Poland" => "Poland",
      "Portugal" => "Portugal",
      "Puerto Rico" => "Puerto Rico",
      "Qatar" => "Qatar",
      "Reunion" => "Reunion",
      "Romania" => "Romania",
      "Russian Federation" => "Russian Federation",
      "RWANDA" => "RWANDA",
      "Saint Helena" => "Saint Helena",
      "Saint Kitts and Nevis" => "Saint Kitts and Nevis",
      "Saint Lucia" => "Saint Lucia",
      "Saint Pierre and Miquelon" => "Saint Pierre and Miquelon",
      "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines",
      "Samoa" => "Samoa",
      "San Marino" => "San Marino",
      "Sao Tome and Principe" => "Sao Tome and Principe",
      "Saudi Arabia" => "Saudi Arabia",
      "Senegal" => "Senegal",
      "Serbia and Montenegro" => "Serbia and Montenegro",
      "Seychelles" => "Seychelles",
      "Sierra Leone" => "Sierra Leone",
      "Singapore" => "Singapore",
      "Slovakia" => "Slovakia",
      "Slovenia" => "Slovenia",
      "Solomon Islands" => "Solomon Islands",
      "Somalia" => "Somalia",
      "South Africa" => "South Africa",
      "South Georgia and the South Sandwich Islands" => "South Georgia and the South Sandwich Islands",
      "Spain" => "Spain",
      "Sri Lanka" => "Sri Lanka",
      "Sudan" => "Sudan",
      "Suriname" => "Suriname",
      "Svalbard and Jan Mayen" => "Svalbard and Jan Mayen",
      "Swaziland" => "Swaziland",
      "Sweden" => "Sweden",
      "Switzerland" => "Switzerland",
      "Syrian Arab Republic" => "Syrian Arab Republic",
      "Taiwan, Province of China" => "Taiwan, Province of China",
      "Tajikistan" => "Tajikistan",
      "Tanzania, United Republic of" => "Tanzania, United Republic of",
      "Thailand" => "Thailand",
      "Timor-Leste" => "Timor-Leste",
      "Togo" => "Togo",
      "Tokelau" => "Tokelau",
      "Tonga" => "Tonga",
      "Trinidad and Tobago" => "Trinidad and Tobago",
      "Tunisia" => "Tunisia",
      "Turkey" => "Turkey",
      "Turkmenistan" => "Turkmenistan",
      "Turks and Caicos Islands" => "Turks and Caicos Islands",
      "Tuvalu" => "Tuvalu",
      "Uganda" => "Uganda",
      "Ukraine" => "Ukraine",
      "United Arab Emirates" => "United Arab Emirates",
      "United Kingdom" => "United Kingdom",
      "United States" => "United States",
      "United States Minor Outlying Islands" => "United States Minor Outlying Islands",
      "Uruguay" => "Uruguay",
      "Uzbekistan" => "Uzbekistan",
      "Vanuatu" => "Vanuatu",
      "Venezuela" => "Venezuela",
      "Viet Nam" => "Viet Nam",
      "Virgin Islands, British" => "Virgin Islands, British",
      "Virgin Islands, U.S." => "Virgin Islands, U.S.",
      "Wallis and Futuna" => "Wallis and Futuna",
      "Western Sahara" => "Western Sahara",
      "Yemen" => "Yemen",
      "Zambia" => "Zambia",
      "Zimbabwe" => "Zimbabwe",
    ];
  }

}
