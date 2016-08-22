<?php

class AttendanceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Wonde\Endpoints\Schools
     */
    public $school;

    public function setUp()
    {
        ini_set('memory_limit','3000M');
        $client = new \Wonde\Client(file_get_contents(__DIR__ . '/../.token'));
        $this->school = $client->school(file_get_contents(__DIR__ . '/../.school'));
    }

    public function test_session()
    {
        $items = [];
        foreach ($this->school->attendance->all() as $row) {
            $items[] = $row;
            $this->assertTrue($row instanceof stdClass);
            $this->assertNotEmpty($row);
        }
        $this->assertTrue($items > 10);
    }

    public function tests_lesson()
    {
        $items = [];
        foreach ($this->school->lessonAttendance->all() as $row) {
            $items[] = $row;
            $this->assertTrue($row instanceof stdClass);
            $this->assertNotEmpty($row);
        }
        $this->assertTrue($items > 10);
    }
}