<?php

/*

Based of
http://stackoverflow.com/a/28542607
with some customisations for appearance of next/previous links

 */

namespace App;

use Illuminate\Pagination\BootstrapThreePresenter;

class Pagination extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into HTML.
     *
     * @return string
     */
    public function render()
    {
        if( ! $this->hasPages())
            return '';

        if( $this->currentPage() == 1)
            return sprintf(
            '<ul class="pagination" aria-label="Pagination">%s %s</ul></div>',
            $this->getLinks(),
            $this->getNextButton(trans('pagination.next') . ' &raquo;')
        );

        if( $this->currentPage() == $this->lastPage())
            return sprintf(
            '<ul class="pagination" aria-label="Pagination">%s %s</ul></div>',
            $this->getPreviousButton('&laquo; ' . trans('pagination.previous')),
            $this->getLinks()
        );

        return sprintf(
            '<ul class="pagination" aria-label="Pagination">%s %s %s</ul></div>',
            $this->getPreviousButton('&laquo; ' . trans('pagination.previous')),
            $this->getLinks(),
            $this->getNextButton(trans('pagination.next') . ' &raquo;')
        );
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '<li class="unavailable" aria-disabled="true"><a href="javascript:void(0)">'.$text.'</a></li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="current"><a href="javascript:void(0)">'.$text.'</a></li>';
    }

    /**
     * Get a pagination "dot" element.
     *
     * @return string
     */
    protected function getDots()
    {
        return $this->getDisabledTextWrapper(trans('pagination.gap'));
    }
}
