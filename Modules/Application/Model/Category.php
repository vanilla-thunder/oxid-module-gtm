<?php

namespace D3\GoogleAnalytics4\Modules\Application\Model;

class Category extends Category_parent
{
    /**
     * @param int $indexOfArray
     * @return string
     */
    public function getSplitCategoryArray(int $indexOfArray = -1) :string
    {
        if ($indexOfArray > -1){
            $splitCatArray =
                array_values(
                    array_filter(
                        explode(
                            '/',
                            trim(
                                parse_url(
                                    $this->getLink(),
                                    5
                                )
                            )
                        )
                    )
                );

            if ($splitCatArray[$indexOfArray]){
                return $splitCatArray[$indexOfArray];
            }else{
                return "";
            }
        }

        return
            trim(
                parse_url(
                    $this->getLink(),
                    5
                )
            );
    }
}