<?php

use PHPUnit\Framework\TestCase;
use app\models\entities\Order;
use app\models\Model;

class OrderTest extends TestCase 
{
    private $order;

    protected function setUp(): void
    {
        $this->order = new Order();
    }

    protected function tearDown(): void
    {
        $this->order = null;
    }    

    /**
     * @dataProvider idData 
     */
    public function testIdPropIsInt($idData)
    {
        $this->order->id = $idData;
        $this->assertIsInt($this->order->id);
        $this->assertEquals($idData, $this->order->id);
    }

    public function idData()
    {
        return [
            [1],
            ['2'],
            [true],
            [false],
        ];
    }

    public function testIsObjOf()
    {
        $this->assertIsObject($this->order);
        $this->assertInstanceOf(Order::class, $this->order);
        $this->assertInstanceOf(Model::class, $this->order);
    }

    /**
     * @dataProvider propsName
     */
    public function testClassAttribute($propsName)
    {
        $this->assertClassHasAttribute($propsName, Order::class);
    }

    /**
     * @dataProvider propsName
     */
    public function testObjectAttribute($propsName)
    {
        $this->assertObjectHasAttribute($propsName, $this->order);
    }

    public function propsName()
    {
        return [
            ['id'],
            ['buyer_name'],
            ['phone'],
            ['user_id'],
            ['buyer_id'],
            ['status'],
        ];
    }

    public function testChangedProps()
    {
        $this->assertIsArray($this->order->changedProps);
    }

    /**
     * @dataProvider propValue
     */
    public function testPropsValue($propValue)
    {
        $this->order->buyer_id = $propValue;
        $this->order->phone = $propValue;
        $this->order->user_id = $propValue;
        $this->order->buyer_name = $propValue;
        $this->order->status = $propValue;

        $this->assertEquals($propValue, $this->order->buyer_id);
        $this->assertEquals($propValue, $this->order->phone);
        $this->assertEquals($propValue, $this->order->user_id);
        $this->assertEquals($propValue, $this->order->buyer_name);
        $this->assertEquals($propValue, $this->order->status);
    }

    public function propValue()
    {
        return [
            [1],
            ['2'],
            [3.5],
            [true],
            [false],
            ['строка'],
            ['12строка с числом'],
        ];
    }
}
