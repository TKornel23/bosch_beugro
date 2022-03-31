using ProductionSimulation.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ProductionSimulation.Logic
{
    public class ProductionLogic
    {
        public List<Products> ProductsList { get; set; }
        private cs_beugroContext _ctx;
        private List<Production> Production;

        public ProductionLogic(cs_beugroContext ctx)
        {
            this._ctx = ctx;
            this.SetupProducts();
            this.SimulateProduction();
        }

        private void SetupProducts()
        {
            this.ProductsList = _ctx.Products.ToList<Products>();
        }

        private List<int> GetProductIds()
        {
            List<int> selectedProducts = new List<int>();
            for (int i = 0; i < 10; i++)
            {
                int rnd = RandomGenerator.GetProductsRnd.Next(0, ProductsList.Count());
                int selectedProductId = ProductsList.First(x => x.Id == rnd).Id;
                selectedProducts.Add(selectedProductId);
            }
            return selectedProducts;
        }

        public void SimulateProduction()
        {
            List<int> selectedProducts = GetProductIds();
            List<Production> production = new List<Production>();
            for (int i = 0; i < selectedProducts.Count(); i++)
            {
                production.Add(new Production()
                {
                    PcbId = selectedProducts[i],
                    Quantity = RandomGenerator.ProductionRnd.Next(1, 1001),
                    StartDate = DateTime.Now.AddMinutes((double)(-1 * (RandomGenerator.StartDateRnd.Next(10, 20)))),
                    EndDate = DateTime.Now.AddMinutes((double)(-1 * (RandomGenerator.EndDateRnd.Next(1, 15))))
                });
            }
            this.Production = production;
        }
    }
}
