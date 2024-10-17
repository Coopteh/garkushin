<?php

namespace Templates;

class HomeTemplate extends BaseTemplate
{
  public function getHomeTemplate(): string
  {
    $template = parent::getBaseTemplate();
        $str= '';
        session_start();
        if (isset($_SESSION['flash'])) {
            $str .= <<<END
                <div id="liveAlertBtn" class="alert alert-success alert-dismissible" role="alert">
                    <div>{$_SESSION['flash']}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    onclick="this.parentNode.style.display='none';"></button>
                </div>
            END;
            unset($_SESSION['flash']);
        }
    $str .= <<<END
        <div class="container">
            <div id="carouselExample" class="carousel slide  " data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/png1.jpg" class="d-block w-100" alt="Бургер с мазиком" height="719">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/png2.jpg" class="d-block w-100" alt="Бургер с макаронами" height="719">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/png3.jpg" class="d-block w-100" alt="Бургер с картошкой" height="719">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row mt-5">
            <p>
                Приглашаем в наш автосервис "ЗАДНИЙ ПРИВОД"!
            </p>
            <p>
                Листайте каталог и добавляйте товар в корзину, нажимая кнопку "Купить".
                Нажмите "Создать заказ", чтобы окончательно оформить заказ:
            </p>
            <div class="ml-10">
                <ul>
                     <li>узнать итоговую сумму заказа</li>
                    <li>ввести данные для оформления заказа</li>
                    <li>подтвердить заказ</li>
                </ul>
            </div>
        </div>   
        <script src="./js/bootstrap.bundle.min.js" type="text/javascript"></script>
        END;
    $resultTemplate = sprintf($template, 'Главная страница', $str);
    return $resultTemplate;
  }
}