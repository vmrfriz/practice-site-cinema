<?php

class ReservationCollection extends Collection
{
    public function add(Reservation $reservation) {
        // if (!$this->has($reservation->id)) {
        $this->_collection[] = $reservation;
        // }
    }
}
