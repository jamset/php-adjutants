<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 15.01.16
 * Time: 20:15
 */
namespace Adjutants\Processes\Inventory\Models;

use Adjutants\Processes\Interfaces\PortsModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Adjutants\Processes\Inventory\Models\LaravelPortsModel
 *
 */
class LaravelPortsModel extends Model implements PortsModelInterface
{
    protected $table;
    protected $connection;

    protected $fillable = ['port_number', 'status'];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPortNumber()
    {
        return $this->port_number;
    }

    /**
     * @param mixed $portNumber
     */
    public function setPortNumber($portNumber)
    {
        $this->port_number = $portNumber;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $result = parent::save($options);

        return $result;
    }


}
