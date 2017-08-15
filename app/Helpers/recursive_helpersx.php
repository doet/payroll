<?php
/*--Menu recursive--*/
class recursive_helper { 
    public static function print_recursive($multilevel,$page,$aktif_menu) {
        $strmenu = "";        
        $aktif=explode(',', $aktif_menu);
        
        foreach($multilevel as $data){                   
            $strmenu .= '
                <li ';
                if (in_array($data['nama'], $aktif))$strmenu .= 'class="open"';
           
            if ($page==$data['nama'])$strmenu .= 'class="active"';
            $strmenu .= '>

                    <a href="'.$data['part'].'" class="';
            if (self::print_recursive($data['child'],$page,''))$strmenu .='dropdown-toggle';
            $strmenu .= '">
                        <i class="menu-icon fa '.$data['icon'].'"></i>
                        <span class="menu-text"> '.$data['nama'].' </span>

                        <b class="arrow ';
            if (self::print_recursive($data['child'],$page,''))$strmenu .= 'fa fa-angle-down';
            $strmenu .= '"></b>
                    </a>';

            if (self::print_recursive($data['child'],$page,''))$strmenu .='<ul class="submenu">'.self::print_recursive($data['child'],$page,'').'</ul>';

            $strmenu .='</li>';
        }
//        return $strmenu;
        return $strmenu;
    }

    public static function aktif_menu($aktif_menu,$page) {
        $strmenu = "";

        foreach($aktif_menu as $data){           
            if (self::aktif_menu($data['child'],$page))$strmenu .='';else$strmenu .=',';
            
            if ($page==$data['nama'])return $strmenu;
            $strmenu .= $data['nama'];

            if (self::aktif_menu($data['child'],$page)){
               $strmenu .=self::aktif_menu($data['child'],$page);
            } else {
                
            }

            $strmenu .='</li>';
        }
        return $strmenu;
    }

    public static function print_aktifmenu($aktif_menu,$page) {
        $strmenu = "";

        foreach($aktif_menu as $data){           
            $strmenu .= '<li>'.$data['nama'].'';

            if ($page==$data['nama'])return $strmenu;

            if (self::print_aktifmenu($data['child'],$page)){
               $strmenu .=self::print_aktifmenu($data['child'],$page).'';
            }

            $strmenu .='</li>';
        }
        return $strmenu;
    }
   
}