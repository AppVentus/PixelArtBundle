<?php
namespace AppVentus\PixelArtBundle\Twig\Extension;

class PixelArtExtension extends \Twig_Extension
{


    public function getFilters()
    {
        return array(
            'pixelart' => new \Twig_Filter_Method($this, 'pixelArtFilter'),
            'allpixelarts' => new \Twig_Filter_Method($this, 'allPixelArtsFilter'),
        );
    }

    public function pixelArtFilter($text, $font = null, $html = true)
    {
        if ($font === null) {
            $fonts = $this->getFonts();
            $font = $fonts[array_rand($fonts)];
        }
        exec(__DIR__."/../../bin/figlet -f ".$font." ".$text, $art);
        if ($html) {
            $art = str_replace(" ", "&nbsp;", $art);
            $art = "<div data-font='".$font."' style='font-family:monospace;'>".implode("<br>", $art)."</div>";
        } else {
            $art = implode("\n", $art);
        }
        return $art;
    }
    public function allPixelArtsFilter($text)
    {
        $fonts = $this->getFonts();
        $arts = "";
        foreach ($fonts as $font) {
            $art = array();
            exec(__DIR__."/../../bin/figlet -f ".$font." ".$text, $art);
            $art = str_replace(" ", "&nbsp;", $art);
            $arts .= "<p>".$font."</p><div data-font='".$font."' style='font-family:monospace;'>".implode("<br>", $art)."</div><br>";
        }

        return $arts;
    }

    public function getName()
    {
        return 'pixelart_extension';
    }








    public function getFonts()
    {
        return array("calgphy2",
            "caligraphy",
            "catwalk",
            "chunky",
            "cjkfonts.tar.gz",
            "coinstak",
            "colossal",
            "computer",
            "contessa",
            "contrast",
            "cosmic",
            "cosmike",
            "crawford",
            "cricket",
            "cyberlarge",
            "cybermedium",
            "cybersmall",
            "decimal",
            "diamond",
            "digital",
            "doh",
            "doom",
            "dotmatrix",
            "double",
            "drpepper",
            "dwhistled",
            "eftichess",
            "eftichessChart",
            "eftifont",
            "eftipiti",
            "eftirobot",
            "eftitalic",
            "eftiwall",
            "eftiwater",
            "epic",
            "febrew",
            "fender",
            "fourtops",
            "fraktur",
            "fuzzy",
            "goofy",
            "gothic",
            "graceful",
            "gradient",
            "graffiti",
            "hex",
            "hollywood",
            "invita",
            "isometric1",
            "isometric2",
            "isometric3",
            "isometric4",
            "italic",
            "ivrit",
            "jazmine",
            "jerusalem",
            "katakana",
            "kban",
            "l4me",
            "larry3d",
            "lcd",
            "lean",
            "letters",
            "linux",
            "lockergnome",
            "madrid",
            "marquee",
            "maxfour",
            "mike",
            "mini",
            "mirror",
            "mnemonic",
            "morse",
            "moscow",
            "mshebrew210",
            "nancyj-fancy",
            "nancyj-underlined",
            "nancyj",
            "nipples",
            "ntgreek",
            "nvscript",
            "o8",
            "Obanner-canon",
            "Obanner",
            "octal",
            "ogre",
            "os2",
            "pawp",
            "peaks",
            "pebbles",
            "pepper",
            "poison",
            "puffy",
            "pyramid",
            "rectangles",
            "relief",
            "relief2",
            "rev",
            "roman",
            "rot13",
            "rounded",
            "rowancap",
            "rozzo",
            "runic",
            "runyc",
            "sblood",
            "script",
            "serifcap",
            "shadow",
            "short",
            "slant",
            "slide",
            "slscript",
            "small",
            "smisome1",
            "smkeyboard",
            "smscript",
            "smshadow",
            "smslant",
            "smtengwar",
            "speed",
            "stacey",
            "stampatello",
            "standard",
            "starwars",
            "stellar",
            "stop",
            "straight",
            "tanja",
            "tengwar",
            "term",
            "thick",
            "thin",
            "threepoint",
            "ticks",
            "ticksslant",
            "tinker-toy",
            "tombstone",
            "trek",
            "tsalagi",
            "twopoint",
            "univers",
            "usaflag",
            "weird",
            "whimsy",
            "3-d",
            "3x5",
            "5lineoblique",
            "acrobatic",
            "alligator",
            "alligator2",
            "alphabet",
            "avatar",
            "banner",
            "banner3-D",
            "banner3",
            "banner4",
            "barbwire",
            "basic",
            "bdffonts",
            "bell",
            "big",
            "bigchief",
            "binary",
            "block",
            "broadway",
            "bubble",
            "bulbhead",
            "C64-fon");
    }
}
