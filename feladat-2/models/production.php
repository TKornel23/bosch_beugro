<?php

namespace model;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    public int $Id;
    public int $Pcb_Id;
    public int $Quantity;
    public DateTime $StartDate;
    public DateTime $EndDate;
}