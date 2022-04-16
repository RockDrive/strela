<?php

namespace App\View\Components\Contact;

use App\Models\Components\Contact;
use App\Models\Components\Header;
use Illuminate\View\Component;

class Map extends Component
{

    public $map;
    public $lang;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lang, $type)
    {
        $this->lang = $lang;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $site_name = Header::firstWhere("lang", $this->lang)->site_name;
        $contacts = Contact::firstWhere("lang", $this->lang);
        $this->map = [
            "lat" => $contacts["map_lat"] ?? '44.511892',
            "lng" => $contacts["map_lng"] ?? '34.167194',
            "title" => $site_name ?? 'Отель "Стрела"',
            "description" => $contacts["address"] ?? 'Отель "Стрела", Республика Крым, г. Ялта, ул. Вергасова, 7',
        ];
        return view('components.contact.map');
    }
}
