using ProductionSimulation.Models;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ProductionSimulation.Logic
{
    public class ProductionLogic
    {
        public List<Products> ProductsList { get; set; }
        private cs_beugroContext _ctx;
        private List<Production> ProductionList;

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
                int rnd = RandomGenerator.GetProductsRnd.Next(1, ProductsList.Count());
                int selectedProductId = ProductsList.First(x => x.Id == rnd).Id;
                selectedProducts.Add(selectedProductId);
            }
            return selectedProducts;
        }

        private void SimulateProduction()
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
            this.ProductionList = production;
        }

        public void WriteOutSimulations()
        {
            StreamWriter sw = new StreamWriter("puffer.txt", false);
            sw.WriteLine("pcb_id|quantity|startDate|endDate");
            foreach (Production item in ProductionList)
            {
                sw.WriteLine($"{item.PcbId}|{item.Quantity}|{item.StartDate}|{item.EndDate}");
            }
            sw.Close();
        }

        private List<Production> ReadSimulations()
        {
            List<Production> tmpProduction = new List<Production>();
            StreamReader sr = new StreamReader("puffer.txt");
            sr.ReadLine();
            while (!sr.EndOfStream)
            {
                string[] line = sr.ReadLine().Split('|');
                tmpProduction.Add(new Production()
                {
                    PcbId = int.Parse(line[0]),
                    Quantity = int.Parse(line[1]),
                    StartDate = DateTime.Parse(line[2]),
                    EndDate = DateTime.Parse(line[3])
                });
            }
            sr.Close();
            Production ProductionToBeDelted = tmpProduction.FirstOrDefault(x => x.Id == 4);

            if (!(ProductionToBeDelted is null))
            {
                tmpProduction.Remove(ProductionToBeDelted);
            }
            tmpProduction.Remove(tmpProduction.GetRange(3,1).First());

            return tmpProduction;
        }

        public void SaveProdcution()
        {
            this.WriteOutSimulations();
            this.ReadSimulations().ForEach(x => _ctx.Production.Add(x));
            _ctx.SaveChanges();
        }
    }
}
