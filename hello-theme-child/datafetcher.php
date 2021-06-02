<?php
// Antti 2.6.21
// added api key check
	// here we get api_key
	$api = get_option('autosofta_json_plugin_options');
	$api_key = $api['api_key'];
/**
 * Fetches data displayed on the websites from Autosofta
 * Version 2.2
 * 15.01.2015
 * 
 * Possible settings:
 * $settings = array(
 *   "ajankohtaiset" => array(
 *     "format_pvm" => ""
 *   ),
 *   "ajoneuvotiedot" => array(
 *     "id" => "", // ajoneuvon id int
 *     "a" => "", // IkÃ¤raja int
 *     "f" => "", // ajoneuvolaji string (autot, motot, moottoripyora, mopo, skootteri, mopoauto, monkija, moottorikelkka, veneet, karavaanit)
 *     "al" => "", // ajoneuvolaji yksiselitteinen string (esim. HenkilÃ¶auto), useamman voi erotella |-merkillÃ¤, NOT IN tulee !-merkillÃ¤ ajoneuvolajin eteen
 *     "hr" => "", // hintaraja int
 *     "k" => "", // kuvatyyppi string (original, thumb)
 *     "nk" => "", // nÃ¤ytÃ¤ myÃ¶s kuvattomat ajoneuvot int (0,1) ("" tulkitaan nollaksi)
 *     "kmin" => "", // kuvia vÃ¤hintÃ¤Ã¤n int
 *     "l" => "", // palautettavia ajoneuvoja int
 *     "n1" => "", // nettisivun nosto 1
 *     "n2" => "", // nettisivun nosto 2
 *     "r" => "", // satunnainen jÃ¤rjestys int (0, 1)
 *     "s" => "", // sijainti string
 *     "u" => "", // uusimmat ajoneuvot int (0, 1)
 *     "v" => "", // kaikki varusteet int (0, 1)
 *     "ve" => "", // varusteet eriteltyinÃ¤ varusteisiin ja lisÃ¤varusteisiin
 *     "p" => "", // portaali eli nÃ¤ytetÃ¤Ã¤n omilla www-sivuilla -valinta int (0, 1) tai string "" (sekÃ¤ ettÃ¤)
 *     "lt" => "", // laajat tiedot (0, 1)
 *     "kay" => "", // kÃ¤ytetty int (0, 1) tai string "" (sekÃ¤ ettÃ¤).
 *     "vtieto" => "", // varastotieto string kokonaislukuja (Varastotietovaihtoehdot alla) pilkuilla "," erotettuina tai string "" (oletus 1,2,11),
 *     "sort" => "" // jÃ¤rjestetÃ¤Ã¤n tulokset annetun sarakkeen mukaan string ("" jÃ¤ttÃ¤Ã¤ huomiotta); pilkulla voi halutessaan erottaa useamman sarakkeen; suunnan (asc tai desc) voi halutessaan mÃ¤Ã¤rittÃ¤Ã¤ sarakekohtaisesti |-merkillÃ¤ esim. id|asc (oletuksena asc)
 *   )
 * );
 * 
 * Basic usage:
 * $dataFetcher = new DataFetcher("AL32OY98", $settings);
 * var_dump($dataFetcher->fetchMainoslauseet());
 * var_dump($dataFetcher->fetchAjankohtaiset());
 * var_dump($dataFetcher->fetchAjoneuvotiedot());
 * var_dump($dataFetcher->fetchRahoitustiedot());
 * 
 * Varastotietovaihtoehdot
 * 1 = tulossa myyntiin
 * 2 = myynnissÃ¤
 * 3 = myyty, laskuttamaton
 * 4 = myyty, od. maksusuorit.
 * 5 = myyty, maksu suoritettu
 * 6 = tulossa, kauppa sovittu
 * 7 = myyty
 * 8 = myyty, luovuttamaton
 * 9 = tarjouslaskennassa
 * 10 = ei aktiivinen
 * 11 = myyntitili
 *
 * @author KÃ¤yttÃ¶softa Oy
 * 
 */

class DataFetcher
{
  protected $c;
  protected $url = "https://www.autosofta.fi/autosofta/portals/ajoneuvontiedot.php?c=". $api_key ."&lt=1&vtieto=2";
  protected $settings;
  
  function __construct($c, $settings = array())
  {
    if (strlen(trim($c)) == 0)
      throw new Exception("Kohdeliike puuttuu");
    
    $this->c = $c;
    $this->settings = $settings;
  }
  
  public function fetchYhteystiedot()
  {
    $fields = array(
      "yhteystiedot" => true
    );
    
    $result = $this->fetch($fields);
    
    if (isset($result["yhteystiedot"]))
      return $result["yhteystiedot"];
    else
      return false;
  }
  
  public function fetchMainoslauseet()
  {
    $fields = array(
      "mainoslauseet" => true
    );
    
    $result = $this->fetch($fields);
    
    if (isset($result["mainoslauseet"]))
      return $result["mainoslauseet"];
    else
      return false;
  }
  
  public function fetchAjankohtaiset()
  {
    $fields = array(
      "ajankohtaiset" => true
    );
    
    if (isset($this->settings["ajankohtaiset"]["format_pvm"]))
      $fields["format_pvm"] = $this->settings["ajankohtaiset"]["format_pvm"];
    
    $result = $this->fetch($fields);
    
    if (isset($result["ajankohtaiset"]))
      return $result["ajankohtaiset"];
    else
      return false;
  }
  
  public function fetchAjoneuvotiedot()
  {
    $fields = array(
      "ajoneuvotiedot" => true
    );
    
    $gets = array("id", "a", "f", "al", "hr", "k", "nk", "kmin", "l", "n1", "n2", "r", "s", "u", "v", "ve", "p", "lt", "kay", "vtieto", "sort");
    foreach ($gets as $get)
    {
      if (isset($this->settings["ajoneuvotiedot"][$get]))
        $fields["get_" . $get] = $this->settings["ajoneuvotiedot"][$get];
    }
    
    $result = $this->utf8DecodeArray($this->fetch($fields));
    
    if (isset($result["ajoneuvotiedot"]))
      return $result["ajoneuvotiedot"];
    else
      return false;
  }
  
  public function fetchRahoitustiedot()
  {
    $fields = array(
      "rahoitustiedot" => true
    );
    
    $result = $this->utf8DecodeArray($this->fetch($fields));
    
    if (isset($result["rahoitustiedot"]))
      return $result["rahoitustiedot"];
    else
      return false;
  }
  
  protected function fetch($fields)
  {
    $fields["c"] = $this->c;
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    
    $error = false;

    //Check for errors
    if ($result === false || curl_errno($ch))
    {
      $error = curl_error($ch);
    }
    else
    {
      $returnCode = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
      
      if ($returnCode != 200)
      {
        $error = $result;
      }
    }

    curl_close($ch);
    
    $json = json_decode(utf8_encode($result), true);
    
    if (isset($json["error"]))
      $error = $json["error"];
    
    if ($error !== false)
      throw new Exception($error);
    else
      return $json;
  }

  /**
  * UTF8 Encodes entire array and also converts objects into arrays
  *
  * @param array $array
  * @return array 
  */
  protected function utf8EncodeArray($array)
  {
    $utf8EncodedArray = array();

    foreach ($array as $key => $value)
    {
      if (is_object($value))
        $value = get_object_vars($value);

      if (is_array($value))
      {
        $utf8EncodedArray[$key] = $this->utf8EncodeArray($value);
        continue;
      }

      $utf8EncodedArray[$key] = utf8_encode($value);
    }

    return $utf8EncodedArray;
  }

  /**
  * UTF8 Decodes entire array (if not told otherwise) and converts objects into arrays
  *
  * @param array $array
   * @param type $onlyObjectToArray
  * @return array 
  */
  protected function utf8DecodeArray($array, $onlyObjectToArray = false)
  {
    $utf8DecodedArray = array();

    if (is_array($array))
    {
      foreach ($array as $key => $value)
      {
        if (is_object($value))
          $value = get_object_vars($value);

        if (is_array($value))
        {
          $utf8DecodedArray[$key] = $this->utf8DecodeArray($value, $onlyObjectToArray);
          continue;
        }

        if ($onlyObjectToArray)
          $utf8DecodedArray[$key] = $value;
        else
          $utf8DecodedArray[$key] = utf8_decode($value);
      }
    }

    return $utf8DecodedArray;
  }

}

?>