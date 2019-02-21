<?php

class Gym
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Get all available gyms
     * @return bool
     */
    public function getAllGyms() {
        $this->db->query("SELECT * FROM gyms WHERE gym_is_activated = '1' ");
        $results = $this->db->resultSet();
        if($this->db->rowCount() > 0) {
            return $results;
        }
        return false;
    }

    /**
     * Activate or deactivate a gym
     * @param string $isActivated
     * @param string $id
     * @return bool
     */
    public function activateGym(string $isActivated, string $id) {
        $this->db->query('UPDATE gyms 
                              SET  gym_is_activated = :isActivated
                              WHERE gym_id = :id');
        $this->db->bind(':isActivated', $isActivated);
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        }catch (Exception $e) {
            return false;
        }
    }

    /**
     * Admin can delete Gyms if he wants to
     * @param string $id
     * @return bool
     */
    public function deleteGym(string $id) {
        $this->db->query('DELETE FROM gyms WHERE gym_id = :id');
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Delete trainers of specific Gym
     * before deleting the gym
     * @param string $id
     * @return bool
     */
    public function deleteTrainersByGymId(string $id) {
        $this->db->query('DELETE FROM trainers WHERE gym_id = :id');
        $this->db->bind(':id', $id);

        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Find Gym by ID
     * @param string $gym_id
     * @return bool
     */
    public function findGymById(string $gym_id) {
        $this->db->query('SELECT * FROM gyms WHERE gym_id = :gym_id');
        $this->db->bind(':gym_id', $gym_id);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else {
            return false;
        }
    }
}