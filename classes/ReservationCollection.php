<?php

class ReservationCollection extends Collection
{
    public function add(Reservation $reservation) {
        // if (!$this->has($reservation->id)) {
        $this->_collection[] = $reservation;
        // }
    }

    public function hasReservation(int $row, int $seat) {
        foreach ($this->_collection as $reservation) {
            if ($row == $reservation->row && $seat == $reservation->seat) return true;
        }
        return false;
    }
}
