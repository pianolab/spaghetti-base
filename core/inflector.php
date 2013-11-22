<?php
/**
 *  A classe Inflector é responsável pelas conversões de strings como remoção de
 *  acentos e caracteres especiais, camelização e humanização de strings, entre outros.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class Inflector extends Object 
{
    private static $plural = array(
        '/(quiz)$/i'               => "$1zes",
        '/^(ox)$/i'                => "$1en",
        '/([m|l])ouse$/i'          => "$1ice",
        '/(matr|vert|ind)ix|ex$/i' => "$1ices",
        '/(x|ch|ss|sh)$/i'         => "$1es",
        '/([^aeiouy]|qu)y$/i'      => "$1ies",
        '/(hive)$/i'               => "$1s",
        '/(?:([^f])fe|([lr])f)$/i' => "$1$2ves",
        '/(shea|lea|loa|thie)f$/i' => "$1ves",
        '/sis$/i'                  => "ses",
        '/([ti])um$/i'             => "$1a",
        '/(tomat|potat|ech|her|vet)o$/i'=> "$1oes",
        '/(bu)s$/i'                => "$1ses",
        '/(alias)$/i'              => "$1es",
        '/(octop)us$/i'            => "$1i",
        '/(ax|test)is$/i'          => "$1es",
        '/(us)$/i'                 => "$1es",
        '/s$/i'                    => "s",
        '/$/'                      => "s"
    );

    private static $singular = array(
        '/(quiz)zes$/i'             => "$1",
        '/(matr)ices$/i'            => "$1ix",
        '/(vert|ind)ices$/i'        => "$1ex",
        '/^(ox)en$/i'               => "$1",
        '/(alias)es$/i'             => "$1",
        '/(octop|vir)i$/i'          => "$1us",
        '/(cris|ax|test)es$/i'      => "$1is",
        '/(shoe)s$/i'               => "$1",
        '/(o)es$/i'                 => "$1",
        '/(bus)es$/i'               => "$1",
        '/([m|l])ice$/i'            => "$1ouse",
        '/(x|ch|ss|sh)es$/i'        => "$1",
        '/(m)ovies$/i'              => "$1ovie",
        '/(s)eries$/i'              => "$1eries",
        '/([^aeiouy]|qu)ies$/i'     => "$1y",
        '/([lr])ves$/i'             => "$1f",
        '/(tive)s$/i'               => "$1",
        '/(hive)s$/i'               => "$1",
        '/(li|wi|kni)ves$/i'        => "$1fe",
        '/(shea|loa|lea|thie)ves$/i'=> "$1f",
        '/(^analy)ses$/i'           => "$1sis",
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i'  => "$1$2sis",
        '/([ti])a$/i'               => "$1um",
        '/(n)ews$/i'                => "$1ews",
        '/(h|bl)ouses$/i'           => "$1ouse",
        '/(corpse)s$/i'             => "$1",
        '/(us)es$/i'                => "$1",
        '/s$/i'                     => ""
    );

    private static $irregular = array(
        'move'   => 'moves',
        'foot'   => 'feet',
        'goose'  => 'geese',
        'sex'    => 'sexes',
        'child'  => 'children',
        'man'    => 'men',
        'tooth'  => 'teeth',
        'person' => 'people'
    );

    private static $uncountable = array(
        'sheep',
        'fish',
        'deer',
        'series',
        'species',
        'money',
        'rice',
        'information',
        'equipment'
    );

    public static function pluralize( $string )
    {
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), self::$uncountable ) )
            return $string;

        // check for irregular singular forms
        foreach ( self::$irregular as $pattern => $result )
        {
            $pattern = '/' . $pattern . '$/i';

            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string);
        }

        // check for matches using regular expressions
        foreach ( self::$plural as $pattern => $result )
        {
            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string );
        }

        return $string;
    }

    public static function singularize( $string )
    {
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), self::$uncountable ) )
            return $string;

        // check for irregular plural forms
        foreach ( self::$irregular as $result => $pattern )
        {
            $pattern = '/' . $pattern . '$/i';

            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string);
        }

        // check for matches using regular expressions
        foreach ( self::$singular as $pattern => $result )
        {
            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string );
        }

        return $string;
    }
    /**
     *  Transforma uma string para o formato camelizado. Ex.: a-casa-amarela => aCasaAmarela
     *  
     *  @param string $string String de entrada
     *  @return string String de saída
     */ 
    public static function camelize($string = "") {
        return str_replace(" ", "", ucwords(str_replace(array("_", "-"), " ", $string)));
    }
    /**
     *  Transforma uma string para o formato humanizado. Ex.: a-casa-amarela => A Casa Amarela
     *  
     *  @param string $string String de entrada
     *  @return string String de saída
     */
    public static function humanize($string = "") {
        return ucwords(str_replace(array("_", "-"), " ", $string));
    }
    /**
     *  Substitui os espaços de uma string pelo "_" e converte as letras para caixa-baixa.
     *  Ex.: A Casa Amarela => a_casa_amarela
     *  
     *  @param string $string String de entrada
     *  @return strign String de saída
     */
    public static function underscore($string = "") {
        return strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $string));
    }
    /**
     *  Transforma uma string no formato slug, em caixa-baixa, com espaços substituídos
     *  por hífens, com a remocao de caracteres acentuados e especiais, deixando
     *  apenas letras minúsculas.
     * 
     *  @param string $string String de entrada
     *  @param string $replace String para substituição do espaço
     *  @return string String de saída
     */
    public static function slug($string = "", $replace = "-") {
        $map = array(
            "/À|à|Á|á|å|Ã|â|Ã|ã/" => "a",
            "/È|è|É|é|ê|ê|ẽ|Ë|ë/" => "e",
            "/Ì|ì|Í|í|Î|î/" => "i",
            "/Ò|ò|Ó|ó|Ô|ô|ø|Õ|õ/" => "o",
            "/Ù|ù|Ú|ú|ů|Û|û|Ü|ü/" => "u",
            "/ç|Ç/" => "c",
            "/ñ|Ñ/" => "n",
            "/ä|æ/" => "ae",
            "/Ö|ö/" => "oe",
            "/Ä|ä/" => "Ae",
            "/Ö/" => "Oe",
            "/ß/" => "ss",
            "/[^\w\s]/" => " ",
            "/\\s+/" => $replace,
            "/^{$replace}+|{$replace}+$/" => ""
        );
        return strtolower(preg_replace(array_keys($map), array_values($map), $string));
    }
    /**
     *  Substitui o hífens "-" na string pelo caractere underscore "_".
     * 
     *  @param string $string String de entrada
     *  @return string String de saída
     */
    public static function hyphenToUnderscore($string = "") {
        return str_replace("-", "_", $string);
    }
}

?>