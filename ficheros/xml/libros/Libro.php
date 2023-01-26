<?php
class Libro {


   public function __construct(
        private $id,
        private $autor,
        private $title,
        private $genre,
        private $price,
        private $publish_date,
        private $description
   )
   {
    
   }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of autor
         */ 
        public function getAutor()
        {
                return $this->autor;
        }

        /**
         * Set the value of autor
         *
         * @return  self
         */ 
        public function setAutor($autor)
        {
                $this->autor = $autor;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of genre
         */ 
        public function getGenre()
        {
                return $this->genre;
        }

        /**
         * Set the value of genre
         *
         * @return  self
         */ 
        public function setGenre($genre)
        {
                $this->genre = $genre;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of publish_date
         */ 
        public function getPublish_date()
        {
                return $this->publish_date;
        }

        /**
         * Set the value of publish_date
         *
         * @return  self
         */ 
        public function setPublish_date($publish_date)
        {
                $this->publish_date = $publish_date;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
}