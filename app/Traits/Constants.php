<?php

namespace App\Traits;

trait Constants{
    public $brandImagesPath = "brands/images";
    public $brandRewardDesignsPath = "brands/reward/designs";
    public $myVotedBrandsCookieKey = "myVotedBrandsCookieKey";

    

    // App Statuses

    /**
     * Pending Status
     * @return  0
     */
    public $pendingStatus = 0;

    /**
     * Active Status
     * @return  1
     */
    public $activeStatus = 1;

    /**
     * Declined Status
     * @return int 2
     */
    public $inactiveStatus = 2;

    /**
     * Disabled Status
     * @return int 3
     */
    public $disabledStatus = 3;


    /**
     * Processing Status
     * @return int 4
     */
    public $processingStatus = 4;


    /**
     * Compeleted Status
     * @return int 5
     */
    public $completedStatus = 5;

    /**
     * Cancelled Status
     * @return int 6
     */
    public $cancelledStatus = 6;




    /**Get status of model */
    public function getModelStatus($status){
        switch($status){
            case $this->pendingStatus:
                return 'Pending';
            case $this->activeStatus:
                return 'Active';
            case $this->inactiveStatus:
                return 'Inactive';
            case $this->disabledStatus:
                return 'Disabled';
            case $this->processingStatus:
                return 'Processing';
            case $this->completedStatus:
                return 'Completed';
            case $this->cancelledStatus:
                return 'Cancelled';
            default:
                return null;
        }
    }

    public function getStatusList($index = null){
        return [
            $this->pendingStatus ,
            $this->activeStatus ,
            $this->declinedStatus ,
            $this->disabledStatus ,
            $this->processingStatus ,
            $this->completedStatus ,
            $this->cancelledStatus ,
        ];
    }

}