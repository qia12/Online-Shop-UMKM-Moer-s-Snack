<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index($page = null)
    {
        $data['title'] = 'Homepage';
        $data['content']    = $this->home->select(
            [
                'product.id', 'product.title AS product_title',
                'product.description', 'product.image', 'product.stock', 'product.weight',
                'product.price', 'product.is_available',
                'category.title AS category_title', 'category.slug AS category_slug'
            ]
        )
            ->join('category')
            ->where('product.is_available', 1)
            ->paginate($page)
            ->get();

        $data['total_rows']    = $this->home->where('product.is_available', 1)->count();
        $data['pagination']    = $this->home->makePagination(
            base_url('home'),
            2,
            $data['total_rows']
        );

        $this->home->table    = 'activity';
        $data['activity'] = $this->home->select(
            [
                'activity.description', 'activity.image', 'activity.date',
            ]
        )
            ->get();

        $this->home->table    = 'review';
        $data['review'] = $this->home->select(
            [
                'review.description', 'review.image', 'review.name', 'review.domicile'
            ]
        )
            ->get();
        // var_dump($data['activity']);

        $role = $this->session->userdata('role');
        if ($role == 'admin') {
            $data['page'] = 'pages/home/pageadmin';
        } else {
            $data['page'] = 'pages/home/index';
        }

        $this->view($data);
    }
}

/* End of file Home.php */
